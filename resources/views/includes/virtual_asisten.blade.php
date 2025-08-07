<!-- Tombol Melayang Inline -->
<button id="assistantBtn"
  style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 12px 20px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    z-index: 1000;
    display: flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(#121212, #121212) padding-box,
                linear-gradient(270deg, #ff6ec4, #7873f5, #4facfe, #43e97b, #fddb92) border-box;
    border: 3px solid transparent;
    background-size: 300% 300%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    transition: transform 0.2s ease;
    animation: borderAnimation 6s linear infinite;
  ">
  ✨ AI Assistant
</button>

<!-- Popup Asisten -->
<div id="assistantPopup"
  style="
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 320px;
    background: linear-gradient(135deg, #1e1e1e, #2a2a2a);
    color: #fff;
    border-radius: 12px;
    border: 2px solid transparent;
    background-clip: padding-box, border-box;
    background-origin: border-box;
    box-shadow: 0 6px 16px rgba(0,0,0,0.4);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 999;
    font-family: sans-serif;
  ">
  <div
    style="
      background: linear-gradient(270deg, #ff6ec4, #7873f5, #4facfe, #43e97b, #fddb92);
      color: white;
      padding: 12px;
      font-size: 16px;
      text-align: center;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
    ">
    Virtual Asisten
    <button id="closePopup"
      style="background: transparent; border: none; color: white; font-size: 20px; cursor: pointer;">
      &times;
    </button>
  </div>
  <div style="padding: 14px; font-size: 14px; color: #eee;">
    Halo! Ada yang bisa saya bantu?
    <br><br>
    <a href="{{ route('virtualassist.index') }}">
      <button
        style="
          padding: 8px 14px;
          background: linear-gradient(270deg, #4facfe, #43e97b);
          color: white;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          font-weight: bold;
          width: 100%;
        ">
        Mulai Chat
      </button>
    </a>
  </div>
</div>

<style>
  @keyframes borderAnimation {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  /* Hover efek tombol AI */
  #assistantBtn:hover {
    transform: scale(1.05);
  }

  /* Mode Terang */
  @media (prefers-color-scheme: light) {
    #assistantBtn {
      background: linear-gradient(#ffffff, #ffffff) padding-box,
        linear-gradient(270deg, #ff6ec4, #7873f5, #4facfe, #43e97b, #fddb92) border-box !important;
      color: #333 !important;
    }

    #assistantPopup {
      background: #fff !important;
      color: #333 !important;
      border: 2px solid rgba(0, 0, 0, 0.1) !important;
    }

    #assistantPopup div:first-child {
      color: #fff !important;
    }
  }
</style>

<script>
  const assistantBtn = document.getElementById('assistantBtn');
  const assistantPopup = document.getElementById('assistantPopup');
  const closePopup = document.getElementById('closePopup');

  assistantBtn.addEventListener('click', () => {
    assistantPopup.style.display = assistantPopup.style.display === 'flex' ? 'none' : 'flex';
  });

  closePopup.addEventListener('click', () => {
    assistantPopup.style.display = 'none';
  });
</script>
