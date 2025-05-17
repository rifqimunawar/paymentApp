@extends('mobile::layouts.layout')
@php
  use App\Helpers\Fungsi;
  use Carbon\Carbon;
  $Str = \Illuminate\Support\Str::class;
@endphp

@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <!-- Wallet Card -->
    <div class="section wallet-card-section pt-1">
      <div class="wallet-card">



        <div class="row">
          <div class="section full">

            <ul class="listview image-listview flush">
              @foreach ($data as $item)
                <li class="active">
                  <a href="{{ route('mobile.pesan_show', $item->id) }}"class="item">
                    <div class="icon-box bg-primary">
                      <ion-icon name="arrow-down-outline"></ion-icon>
                    </div>
                    <div class="in">
                      <div>
                        <div class="mb-05"><strong>{{ $item->title ?? '-' }}</strong></div>
                        <div class="text-small mb-05">{{ $Str::limit(strip_tags($item->message), 50) }}
                        </div>
                        <div class="text-xsmall">
                          {{ $item->created_at ? Carbon::parse($item->created_at)->diffForHumans() : '-' }}
                        </div>

                      </div>

                      <span class="badge badge-primary badge-empty"></span>
                    </div>
                  </a>
                </li>
              @endforeach

            </ul>
          </div>
        </div>


      </div>
      <!-- * Wallet Footer -->
    </div>
  </div>
  <!-- Wallet Card -->



  {{-- @include('mobile::layouts.footer') --}}

  </div>
  <!-- * App Capsule -->
@endsection
