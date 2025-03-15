@extends('mobile::layouts.layout')

@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <!-- Wallet Card -->
    <div class="section wallet-card-section pt-1 mb-2">
      <div class="wallet-card">
        <div id="calendar" class="calendar" data-base-url="{{ App\Helpers\GetSettings::getBaseUrl() }}" style="margin: 10px">
        </div>
      </div>
    </div>
    <div class="wallet-card mb-4">
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#accordion001">
              <ion-icon name="calendar-number-outline"></ion-icon>
              Ronda hari ini
            </button>
          </h2>
          <div id="accordion001" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              @forelse ($ronda_hari_ini as $ronda)
                @foreach ($ronda->wargas as $item)
                  <li>{{ $item->nama }}</li>
                @endforeach
              @empty
                <li>Tidak ada jadwal ronda hari ini</li>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wallet-card mb-4">
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#accordion002">
              <ion-icon name="calendar-number-outline"></ion-icon>
              Sudah Absen
            </button>
          </h2>
          {{-- @dd($sudah_absen); --}}
          <div id="accordion002" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              @forelse ($sudah_absen as $absen)
                @if ($absen->warga)
                  <li class="d-flex justify-content-between">
                    <span>{{ $absen->warga->nama }}</span>
                    <span>{{ \Carbon\Carbon::parse($absen->waktu_absen)->format('H:i') }}</span>
                  </li>
                @endif
              @empty
                <li>Belum ada yang absen dalam rentang waktu ini.</li>
              @endforelse
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="form-group basic mt-3 p-4">
      <button type="button" class="btn btn-primary btn-block btn-lg" onclick="captureData()" data-bs-toggle="modal"
        data-bs-target="#modalAbsen">📷 Absen</button>
    </div>

    <!-- modalAbsen -->
    <div class="modal fade action-sheet" id="modalAbsen" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Absen</h5>
          </div>
          <div class="modal-body">
            <div class="action-sheet-content">

              <div class="flex justify-center form-group basic mt-3">
                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                  <p id="loading" style="display: none;">Izinkan lokasi dan kamera &emsp; </p> <br>
                  <p id="location-info">&emsp;</p>
                  <a id="map-link" href="#" target="_blank" style="display: none;">&emsp;</a>
                </div>
                <div style="display: flex; justify-content: center;">
                  <div id="map" style="width: 100%; max-width: 400px; height: 300px; "></div>
                </div>
                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                  <video id="camera-preview" autoplay playsinline
                    style="width: 100%; max-width: 400px; display: none;"></video>
                </div>
                <canvas id="canvas" style="display:none;"></canvas>
                <img id="captured-image" style="display:none; width:100%;" />
              </div>
              <div class="form-group basic mt-3 p-4">
                <button type="button" class="btn btn-primary btn-block btn-lg" onclick="takePhoto()">Ambil
                  Gambar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      let map, marker, videoStream = null;

      function captureData() {
        let loadingElement = document.getElementById("loading");
        loadingElement.style.display = "block";
        if ("geolocation" in navigator) {
          navigator.geolocation.getCurrentPosition(
            function(position) {
              let lat = position.coords.latitude;
              let lon = position.coords.longitude;
              document.getElementById("location-info").innerText = `Latitude: ${lat}, Longitude: ${lon}`;
              let mapLink = `https://www.google.com/maps?q=${lat},${lon}`;
              let linkElement = document.getElementById("map-link");
              linkElement.href = mapLink;
              linkElement.style.display = "block";
              let mapElement = document.getElementById("map");
              mapElement.style.display = "block";
              if (!map) {
                map = new google.maps.Map(mapElement, {
                  center: {
                    lat: lat,
                    lng: lon
                  },
                  zoom: 15
                });
                marker = new google.maps.Marker({
                  position: {
                    lat: lat,
                    lng: lon
                  },
                  map: map
                });
              } else {
                map.setCenter({
                  lat: lat,
                  lng: lon
                });
                marker.setPosition({
                  lat: lat,
                  lng: lon
                });
              }
              startCamera();
            },
            function(error) {
              document.getElementById("location-info").innerText = "Gagal mendapatkan lokasi!";
              loadingElement.style.display = "none";
            }
          );
        } else {
          alert("Geolocation tidak didukung di browser ini!");
          loadingElement.style.display = "none";
        }
      }

      function startCamera() {
        navigator.mediaDevices.getUserMedia({
            video: true
          })
          .then(function(stream) {
            videoStream = stream;
            let videoElement = document.getElementById("camera-preview");
            videoElement.style.display = "block";
            videoElement.srcObject = stream;
          })
          .catch(function() {
            alert("Kamera tidak dapat diakses.");
          });
      }

      function stopCamera() {
        if (videoStream) {
          videoStream.getTracks().forEach(track => track.stop());
          videoStream = null;
        }
        document.getElementById("camera-preview").style.display = "none";
      }

      function takePhoto() {
        let videoElement = document.getElementById("camera-preview");
        if (!videoElement.srcObject) {
          alert("Kamera belum aktif!");
          return;
        }

        let canvas = document.getElementById("canvas");
        let context = canvas.getContext("2d");

        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;
        context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

        canvas.toBlob(blob => {
          let imgElement = document.getElementById("captured-image");
          imgElement.src = URL.createObjectURL(blob);
          imgElement.style.display = "block";

          stopCamera();
          sendData(blob); // LANGSUNG KIRIM DATA KE SERVER
        }, "image/jpeg");
      }

      function sendData(imageBlob) {
        if (!navigator.geolocation) {
          alert("Geolocation tidak didukung oleh handphone ini.");
          return;
        }

        navigator.geolocation.getCurrentPosition(function(position) {
          let lat = position.coords.latitude;
          let lon = position.coords.longitude;

          let formData = new FormData();
          formData.append("img", imageBlob, "photo.jpg");
          formData.append("latitude", lat);
          formData.append("longitude", lon);
          formData.append("_token", "{{ csrf_token() }}");

          fetch("{{ route('mobile.absen') }}", {
              method: "POST",
              body: formData
            })
            .then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
              }
              return response.json();
            })
            .then(data => {
              let modal = document.getElementById('modalAbsen');
              let modalInstance = bootstrap.Modal.getInstance(modal);
              if (modalInstance) {
                modalInstance.hide();
              }

              Swal.fire({
                title: data.title,
                text: data.message || "Absen berhasil!",
                icon: data.icon,
              });
            })
            .catch(error => {
              console.error("Error:", error);

              Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim data. Silakan coba lagi!',
                icon: 'error',
              });
            });

        }, function() {
          alert("Gagal mendapatkan lokasi.");
        });
      }
    </script>

    <!-- Tambahkan Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
  @endsection
