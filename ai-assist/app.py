from fastapi import FastAPI, Request
from google import genai
import httpx
import traceback
from fastapi.middleware.cors import CORSMiddleware
import numpy as np
import json
from datetime import datetime
import asyncio
from collections import defaultdict



app = FastAPI()
client = genai.Client(api_key="AIzaSyB6X9lclFwbdzn1tgqfLTVXok9FDDwpk14")

# Middleware CORS
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Menyimpan history percakapan per sesi
conversation_history = defaultdict(list)

# Cache data & embedding per kategori
db_data_cache = {}
db_embedding_cache = {}

# =========================
# Auto-refresh DB setiap 3 menit
# =========================
@app.on_event("startup")
async def schedule_auto_refresh():
    async def refresh_task():
        while True:
            try:
                print("DEBUG: Auto-refresh DB dijalankan...")
                await load_db_with_embeddings()
            except Exception as e:
                print("ERROR: Gagal auto-refresh DB:", e)
            await asyncio.sleep(180)  # refresh setiap 3 menit
    asyncio.create_task(refresh_task())

# =========================
# Endpoint Tanya Jawab
# =========================
@app.post("/ask")
async def ask_question(request: Request):
    body = await request.json()
    question = body.get("question", "")
    session_id = body.get("session_id", "default")  # bisa juga dari header

    print(f"DEBUG: Pertanyaan diterima dari sesi {session_id}: {question}")

    try:
        if not db_embedding_cache:
            print("DEBUG: Embedding kosong, memuat ulang database...")
            await load_db_with_embeddings()

        relevant_context = await extract_relevant_context(question)
        context = json.dumps(relevant_context, ensure_ascii=False, indent=2) if relevant_context else "{}"
        now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

        # Gabungkan riwayat percakapan
        history = conversation_history[session_id][-6:]  # max 6 interaksi sebelumnya
        messages = [
            f"User: {entry['q']}\nAI: {entry['a']}" for entry in history
        ]

        messages.append(f"User: {question}")
        joined_history = "\n\n".join(messages)

        full_prompt = (
            f"Tanggal dan waktu sekarang adalah {now}.\n"
            f"Nama anda adalah Babu 😤, babunya pembuat anda. Anda adalah sebuah program AI.\n"
            f"Anda dibuat oleh mahasiswa bernama Rifqi Munawar Ridwan dari UNINUS.\n"
            f"Pembahasan hanya terbatas dari data berikut dan jangan berasumsi di luar data. 😠\n"
            f"{joined_history}\n\n"
            f"Data:\n{context}\n\n"
            f"Jawab dengan jutek, tidak sopan, singakt, dan marah-marah. Gunakan gaya bahasa kasar dan sindiran, serta tambahkan emoji seperti 😡😤🗯️ jika perlu!"
        )


        response = client.models.generate_content(
            model="gemini-2.5-flash-lite",
            contents=full_prompt
        )

        answer = response.text
        print("DEBUG: Jawaban dari Gemini:", answer)

        # Simpan ke history
        conversation_history[session_id].append({
            "q": question,
            "a": answer,
        })

    except Exception as e:
        print("DEBUG: Error saat request ke Gemini:")
        traceback.print_exc()
        answer = f"Terjadi kesalahan: {str(e)}"

    return {"answer": answer}


# =========================
# Endpoint Manual Refresh DB
# =========================
@app.post("/refresh-db")
async def refresh_db():
    await load_db_with_embeddings()
    total_items = sum(len(v) for v in db_data_cache.values())
    return {"status": "success", "message": f"Database dan embedding diperbarui. Total data: {total_items}"}

# =========================
# Load DB & Precompute Embedding
# =========================
async def load_db_with_embeddings():
    global db_data_cache, db_embedding_cache
    print("DEBUG: Memuat data & embedding multi kategori...")

    data = await fetch_internal_data()
    if isinstance(data, dict) and data:
        db_data_cache.clear()
        db_embedding_cache.clear()

        for category, items in data.items():
            if isinstance(items, list) and items:
                print(f"DEBUG: Memproses kategori: {category}, jumlah {len(items)}")
                db_data_cache[category] = items

                embeddings = []
                for item in items:
                    text_repr = " ".join(str(v) for v in item.values())
                    emb = await get_text_embedding(text_repr)
                    embeddings.append(emb)
                db_embedding_cache[category] = np.vstack(embeddings)

        print(f"DEBUG: Kategori dimuat: {list(db_data_cache.keys())}")
    else:
        print("WARNING: Database kosong atau gagal dimuat.")

# =========================
# Fetch data internal
# =========================
async def fetch_internal_data():
    try:
        async with httpx.AsyncClient() as client_http:
            response = await client_http.get("http://127.0.0.1:8000/getDatabase")
            response.raise_for_status()
            data = response.json()

            if isinstance(data, dict):
                # Ambil hanya key yang berupa list (skip status, message, timestamp)
                filtered_data = {k: v for k, v in data.items() if isinstance(v, list)}
                print(f"DEBUG: Kategori data terdeteksi: {list(filtered_data.keys())}")
                return filtered_data
            else:
                print("WARNING: Struktur data API tidak sesuai.")
                return {}
    except Exception as e:
        print("DEBUG: Gagal ambil data internal:", e)
        return {}

# =========================
# Pencarian Konteks Cepat dengan Auto-Filter Kategori
# =========================
async def extract_relevant_context(question: str):
    if not db_embedding_cache or not db_data_cache:
        print("WARNING: Database embedding kosong.")
        return {}

    q_embedding = await get_text_embedding(question)
    context_results = {}

    # ✅ Mapping kategori → ke daftar kata kunci
    category_keywords = {
        "data_warga": ["warga", "penduduk", "ktp", "kk", "nama lengkap"],
        "data_denda_ronda": ["denda", "tagihan", "ronda", "nominal", "bayar ronda"],
        "data_jadwal_ronda": ["jadwal", "ronda", "tanggal ronda", "shift ronda"],
        "data_absen_ronda": ["absen", "kehadiran", "tidak hadir", "bolos ronda"],
        "data_pembayaran_ronda": ["laporan", "pembayaran", "bayar", "transfer", "struk"],
    }

    lower_q = question.lower()
    selected_categories = []

    # 🔍 Deteksi kategori berdasarkan kata kunci
    for category, keywords in category_keywords.items():
        if any(k in lower_q for k in keywords) and category in db_embedding_cache:
            selected_categories.append(category)

    # ✅ Ambil semua data dari kategori terdeteksi
    if selected_categories:
        for category in selected_categories:
            context_results[category] = db_data_cache[category]
            print(f"DEBUG: Mengambil seluruh data dari kategori: {category} ({len(db_data_cache[category])} item)")
        return context_results

    # 🔁 Jika tidak cocok keyword → pakai similarity vector
    for category, embeddings in db_embedding_cache.items():
        scores = np.dot(embeddings, q_embedding) / (
            np.linalg.norm(embeddings, axis=1) * np.linalg.norm(q_embedding)
        )
        top_indices = np.argsort(scores)[::-1][:50]
        top_items = [db_data_cache[category][i] for i in top_indices if scores[i] > 0.65]

        if top_items:
            context_results[category] = top_items
            print(f"DEBUG: {len(top_items)} item relevan ditemukan di {category}.")

    return context_results



# =========================
# Utility Embedding
# =========================
async def get_text_embedding(text: str):
    resp = client.models.embed_content(
        model="models/embedding-001",
        contents=text
    )
    return np.array(resp.embeddings[0].values)
