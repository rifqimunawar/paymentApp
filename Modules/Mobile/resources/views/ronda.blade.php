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
    <div class="wallet-card">
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#accordion001">
              <ion-icon name="calendar-number-outline"></ion-icon>
              Tanggal
            </button>
          </h2>
          <div id="accordion001" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              <li>1</li>
              <li>2</li>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Wallet Card -->



    @include('mobile::layouts.footer')

  </div>
  <!-- * App Capsule -->
@endsection
