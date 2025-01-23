@extends('pembayaran::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
    <!-- BEGIN panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">{{ $title }}</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
            class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
            class="fa fa-redo"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
            class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
            class="fa fa-times"></i></a>
      </div>
    </div>
    <div
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      {{-- <a href="{{ route('umum.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
          aria-hidden="true" style="font-size: 12px"></i></a> --}}
      <div style="display: flex; gap: 10px;">
        <a href="{{ route('umum.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a>

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        <a href="{{ route('umum.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a>

      </div>
    </div>

    <!-- END panel-heading -->
    <!-- BEGIN panel-body -->
    <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Tagihan Pam</th>
            <th>Absensi</th>
            <th>Umum</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $index => $warga)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $warga->nama ?? 'Tidak ada nama' }}</td>
              <td>
                @if ($warga->tagihanPam)
                  <ul>
                    @foreach ($warga->tagihanPam as $tagihan)
                      <li>{{ $tagihan->nominal }}</li>
                    @endforeach
                  </ul>
                @else
                  Tidak ada tagihan
                @endif
              </td>
              <td>
                @if ($warga->absens)
                  <ul>
                    @foreach ($warga->absens as $absensi)
                      <li>{{ $absensi->tanggal }} - {{ $absensi->status }}</li>
                    @endforeach
                  </ul>
                @else
                  Tidak ada absensi
                @endif
              </td>
              <td>
                @if ($warga->umums)
                  <ul>
                    @foreach ($warga->umums as $umum)
                      <li>{{ $umum->detail }}</li>
                    @endforeach
                  </ul>
                @else
                  Tidak ada data umum
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- END panel-body -->
  </div>
  <!-- END panel -->
@endsection
