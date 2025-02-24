@extends('mobile::layouts.layout')

@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <!-- Wallet Card -->
    <div class="section wallet-card-section pt-1">
      <div class="wallet-card">

        <div class="accordion" id="accordionExample2">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion001">
                <ion-icon name="wallet-outline"></ion-icon>
                Item 1
              </button>
            </h2>
            <div id="accordion001" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at augue eleifend,
                lacinia ex quis, condimentum erat. Nullam a ipsum lorem.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion002">
                <ion-icon name="card-outline"></ion-icon>
                Item 2
              </button>
            </h2>
            <div id="accordion002" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at augue eleifend,
                lacinia ex quis, condimentum erat. Nullam a ipsum lorem.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion003">
                <ion-icon name="cash-outline"></ion-icon>
                Item 3
              </button>
            </h2>
            <div id="accordion003" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at augue eleifend,
                lacinia ex quis, condimentum erat. Nullam a ipsum lorem.
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- Wallet Card -->
    </div>
    {{-- @include('mobile::layouts.footer') --}}
    <!-- * App Capsule -->
  @endsection
