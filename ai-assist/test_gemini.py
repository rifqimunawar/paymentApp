from google import genai

# Inisialisasi client Gemini
client = genai.Client(api_key="AIzaSyB6X9lclFwbdzn1tgqfLTVXok9FDDwpk14")

print("🔍 Testing koneksi ke Gemini API...")

response = client.models.generate_content(
    model="gemini-1.5-flash",
    contents="Tes koneksi dari Python FastAPI"
)

print("✅ Response dari Gemini:")
print(response.text)
