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

    <div class="form-group basic mt-3">
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
                  <p id="loading" style="display: none;">Mengambil lokasi, harap tunggu...</p>
                  <p id="location-info">Lokasi akan ditampilkan di sini...</p>
                  <a id="map-link" href="#" target="_blank" style="display: none;">&emsp;</a>
                </div>
                <div style="display: flex; justify-content: center;">
                  <div id="map" style="width: 100%; max-width: 400px; height: 300px; "></div>
                </div>
                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                  <video id="camera-preview" autoplay playsinline
                    style="width: 100%; max-width: 400px; display: none;"></video>
                </div>
              </div>
              <div class="form-group basic mt-3">
                <a href="#" class="premium-alert">
                  {{-- <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">Ambil
                    Gambar</button></a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- * modalAbsen -->

    @include('mobile::layouts.footer')

    <script>
      let map, marker;

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

              // Tampilkan peta
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

              // Setelah lokasi didapat, buka kamera
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
            let videoElement = document.getElementById("camera-preview");
            videoElement.style.display = "block";
            videoElement.srcObject = stream;
            document.getElementById("loading").style.display = "none";
          })
          .catch(function(error) {
            alert("Kamera tidak dapat diakses!");
            document.getElementById("loading").style.display = "none";
          });
      }
    </script>

    <!-- Tambahkan Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
  @endsection
