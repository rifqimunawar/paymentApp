@extends('virtualassist::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <div class="panel panel-inverse" style="border-radius:10px; overflow:hidden;">
    <div style="margin:0; font-family: Arial, sans-serif; border-radius: 10px; background:#2d353c;">

      <!-- Container Chat -->
      <div id="chatContainer"
        style="display: flex; flex-direction: column; height: 80vh; border-radius: 10px; overflow: hidden;">

        <!-- Header -->
        <div
          style="
            background: #1f262c;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            flex-shrink: 0;
          ">
          🤖 Virtual Asisten
        </div>

        <!-- Area Pesan -->
        <div class="primary" id="chatMessages"
          style="
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #2d353c;
          ">
        </div>


        <!-- Input Chat -->
        <div
          style="
            display: flex;
            padding: 10px;
            background: #2d353c;
            border-top: 1px solid #444;
            flex-shrink: 0;
          ">
          <input id="chatInput" type="text" autofocus placeholder="Ketik pesan..."
            style="
              flex: 1;
              padding: 10px;
              border: 1px solid #555;
              border-radius: 5px;
              background: #1f262c;
              color: white;
              outline: none;
            ">
          <button id="sendBtn"
            style="
              margin-left: 10px;
              padding: 10px 20px;
              background: #4a90e2;
              color: white;
              border: none;
              border-radius: 5px;
              cursor: pointer;
            ">
            Kirim
          </button>
        </div>
      </div>

      <script>
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendBtn');
        sessionStorage.removeItem("session_id");
        if (!sessionStorage.getItem("session_id")) {
          const sessionId = crypto.randomUUID();
          sessionStorage.setItem("session_id", sessionId);
        }

        const sessionId = sessionStorage.getItem("session_id");
        // Fungsi escape lalu parse bold markdown
        function formatMessage(content) {
          const escapeHTML = (str) => str
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");
          const escaped = escapeHTML(content);
          return escaped.replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>");
        }

        // Tambah pesan langsung
        function addMessage(content, sender = 'user') {
          const msg = document.createElement('div');
          msg.style.maxWidth = '80%';
          msg.style.padding = '10px';
          msg.style.borderRadius = '8px';
          msg.style.wordWrap = 'break-word';
          msg.style.whiteSpace = 'pre-wrap';
          msg.style.alignSelf = sender === 'user' ? 'flex-end' : 'flex-start';
          msg.style.background = sender === 'user' ? '#3e4a52' : '#e0e0e0';
          msg.style.color = sender === 'user' ? 'white' : 'black';

          msg.innerHTML = formatMessage(content);
          chatMessages.appendChild(msg);
          chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Animasi ketik
        function typeMessage(content, sender = 'bot') {
          const msg = document.createElement('div');
          msg.style.maxWidth = '80%';
          msg.style.padding = '10px';
          msg.style.borderRadius = '8px';
          msg.style.wordWrap = 'break-word';
          msg.style.whiteSpace = 'pre-wrap';
          msg.style.alignSelf = sender === 'user' ? 'flex-end' : 'flex-start';
          msg.style.background = sender === 'user' ? '#3e4a52' : '#e0e0e0';
          msg.style.color = sender === 'user' ? 'white' : 'black';

          chatMessages.appendChild(msg);

          const html = formatMessage(content);
          let tempDiv = document.createElement('div');
          tempDiv.innerHTML = html;
          const plainText = tempDiv.textContent || tempDiv.innerText || '';

          let index = 0;
          const typingInterval = setInterval(() => {
            msg.innerText = plainText.slice(0, index++);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            if (index > plainText.length) {
              clearInterval(typingInterval);
              msg.innerHTML = html;
            }
          }, 10);
        }


        // Event klik tombol Kirim
        sendBtn.addEventListener('click', async () => {
          const text = chatInput.value.trim();
          if (!text) return;

          addMessage(text, 'user');
          chatInput.value = '';

          sendBtn.disabled = true;

          const typingIndicator = document.createElement('div');
          typingIndicator.innerText = '🤖 Sedang berfikir...';
          typingIndicator.style.fontStyle = 'italic';
          typingIndicator.style.color = '#888';
          typingIndicator.style.margin = '5px 0';
          typingIndicator.style.alignSelf = 'flex-start';
          chatMessages.appendChild(typingIndicator);
          chatMessages.scrollTop = chatMessages.scrollHeight;

          try {
            const response = await fetch("http://127.0.0.1:8001/ask", {
              method: "POST",
              headers: {
                "Content-Type": "application/json"
              },
              body: JSON.stringify({
                question: text,
                session_id: sessionId
              })
            });

            const data = await response.json();
            chatMessages.removeChild(typingIndicator);
            typeMessage(data.answer || "Tidak ada jawaban.", 'bot');
          } catch (err) {
            chatMessages.removeChild(typingIndicator);
            typeMessage("⚠️ Gagal menghubungi AI server.", 'bot');
          } finally {
            sendBtn.disabled = false;
          }
        });

        chatInput.addEventListener('keydown', (e) => {
          if (e.key === 'Enter') sendBtn.click();
        });
      </script>

    </div>
  </div>
@endsection
