@extends('mobile::layouts.layout')
@php
  use App\Helpers\Fungsi;
@endphp
@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <!-- Wallet Card -->
    <div class="section wallet-card-section pt-1">
      <div class="wallet-card">



        <div class="row">
          @if ($data['kepala'])
            @php
              $statusKeluargaLabels = [
                  1 => 'Kepala Keluarga',
                  2 => 'Suami',
                  3 => 'Istri',
                  4 => 'Anak',
              ];
            @endphp
            <div class="col-md-4">
              <div class="card-block bg-primary mb-2"> {{-- Kepala Keluarga (Biru) --}}
                <div class="card-main">
                  <div class="balance">
                    <span class="label">Nama</span>
                    <h1 class="title">{{ $data['kepala']->nama }}</h1>
                  </div>
                  <div class="in">
                    <div class="card-number">
                      <span class="label">NIK</span>
                      {{ $data['kepala']->nik ?? '-' }}
                    </div>
                    <div class="bottom">
                      <div class="card-expiry">
                        <span class="label">Jenis Kelamin</span>
                        {{ $data['kepala']->jk ?? '-' }}
                      </div>
                      <div class="card-ccv">
                        <span class="label">Usia</span>
                        {{ Fungsi::usia($data['kepala']->tgl_lahir) ?? '-' }}
                      </div>
                    </div>
                    <div class="status">
                      <span class="label">Status</span>
                      <strong>{{ $statusKeluargaLabels[(int) $data['kepala']->status_keluarga] ?? '-' }}</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @foreach ($data['anggota'] as $index => $item)
            @php
              $statusKeluargaLabels = [
                  1 => 'Kepala Keluarga',
                  2 => 'Suami',
                  3 => 'Istri',
                  4 => 'Anak',
              ];
            @endphp
            <div class="col-md-4">
              <div class="card-block bg-success mb-2"> {{-- Anggota Keluarga (Hijau) --}}
                <div class="card-main">
                  <div class="balance">
                    <span class="label">Nama</span>
                    <h1 class="title">{{ $item->nama }}</h1>
                  </div>
                  <div class="in">
                    <div class="card-number">
                      <span class="label">NIK</span>
                      {{ $item->nik ?? '-' }}
                    </div>
                    <div class="bottom">
                      <div class="card-expiry">
                        <span class="label">Jenis Kelamin</span>
                        {{ $item->jk ?? '-' }}
                      </div>
                      <div class="card-ccv">
                        <span class="label">Usia</span>
                        {{ Fungsi::usia($item->tgl_lahir) ?? '-' }}
                      </div>
                    </div>
                    <div class="status">
                      <span class="label">Status</span>
                      <strong>{{ $statusKeluargaLabels[$item->status_keluarga] ?? '-' }}</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>


      </div>
      <!-- * Wallet Footer -->
    </div>
  </div>
  <!-- Wallet Card -->



  @include('mobile::layouts.footer')

  </div>
  <!-- * App Capsule -->
@endsection
