@extends('mobile::layouts.layout')
@php
  use App\Helpers\Fungsi;
  use Carbon\Carbon;
  $Str = \Illuminate\Support\Str::class;
  use App\Helpers\GetSettings;

@endphp

@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <div class="section">

      <div class="listed-detail mt-3">
        <div class="icon-wrapper">
          <div class="iconbox">
            <ion-icon name="arrow-down-outline"></ion-icon>
          </div>
        </div>
        <h3 class="text-center mt-2">{{ $data_detail->title ?? '-' }}</h3>
      </div>

      <ul class="listview simple-listview no-space mt-3 p-2">
        <li>
          <span>From</span>
          <strong>{{ GetSettings::getEmail() }}</strong>
        </li>
        <li>
          <span>To</span>
          <strong>{{ $data_detail->email }}</strong>
        </li>
        <li>
          <span>Date</span>
          <strong> {{ Fungsi::format_tgl($data_detail->created_at) }}</strong>
        </li>
        <li>&emsp;</li>
        <li>
          <span>{!! $data_detail->message !!}</span>
        </li>
      </ul>

    </div>
  </div>
  <!-- Wallet Card -->



  {{-- @include('mobile::layouts.footer') --}}

  </div>
  <!-- * App Capsule -->
@endsection
