@extends('tagihan::layouts.master')

@php
  use App\Helpers\Fungsi;
@endphp

@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Biodata Warga</div>
        </div>
        <div class="card-body">
          <div class="row">
            <table>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $data->nama }}</td>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $data->nik }}</td>
              </tr>
              <tr>
                <td>Usia</td>
                <td>:</td>
                <td>{{ Fungsi::usia($data->tgl_lahir) }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $data->jk }}</td>
              </tr>
              <tr>
                <td>Kota Kelahiran</td>
                <td>:</td>
                <td>{{ $data->kota_kelahiran }}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $data->agama }}</td>
              </tr>
              <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td>{{ $data->pendidikan }}</td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $data->pekerjaan }}</td>
              </tr>
              <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td>{{ $data->status_perkawinan }}</td>
              </tr>
              <tr>
                <td>Status Keluarga</td>
                <td>:</td>
                <td>{{ $data->status_keluarga }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $data->alamat }}</td>
              </tr>
              <tr>
                <td>Telpon/Wa</td>
                <td>:</td>
                <td>{{ $data->telp }}</td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('pam.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">

                <div class="form-group mb-2">
                  <label for="tanggal_input">Tanggal Pengukuran Terakhir</label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" readonly placeholder="tanggal_input"
                      value="{{ $data_pam_sebelumnya->tanggal_input ?? '' }}" />
                  </div>
                </div>
                <label for="">Parameter Pengukuran Terakhir</label>
                <div class="input-group mb-3">
                  <input oninput="numberInput(this)" name="total_parameter_sebelumnya"
                    value="{{ $data_pam_sebelumnya->total_parameter ?? '0' }}" type="text" class="form-control" />
                  <span class="input-group-text"> m3</span>
                </div>
                <hr>
                <div class="form-group mb-2">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" readonly class="form-control" name="tanggal_input" required id="tanggal"
                    placeholder="tanggal" />
                </div>

                <label for="parameter_hari_ini">Parameter Hari Ini</label> <br>
                <div class="input-group">
                  <input oninput="numberInput(this)" type="text" name="total_parameter" class="form-control" />
                  <span class="input-group-text"> m3</span>
                </div>
                <p class="text-danger italic" style="font-style: italic">
                  Parameter hari ini harus lebih besar dari parameter sebelumnya *
                </p>

                <label for="">Biaya /m3</label>
                <div class="input-group mb-3">
                  <input id="biaya_m3" type="text" name="biaya" class="form-control" value="{{ $data_biaya }}"
                    readonly />
                  <span class="input-group-text"> /m3</span>
                </div>


                <div class="card-action">
                  <input type="hidden" name="warga_id" value="{{ $data->id }}">
                  {{-- <input type="hidden" name="id" value="{{ $data_pam_sebelumnya->id ?? '' }}"> --}}
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('pam.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header">
          <div class="card-title">History Tagihan Pam {{ $data->nama }}</div>
        </div>
        <div class="card-body">
          <div class="panel-body">
            <table id="data-table-default" width="100%"
              class="table table-striped table-bordered align-middle text-nowrap">
              <thead>
                <tr>
                  <th width="1%"></th>
                  <th class="text-nowrap">Tanggal</th>
                  <th class="text-nowrap">Parameter</th>
                  <th class="text-nowrap">Total Penggunaan</th>
                  <th class="text-nowrap">Nominal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tagihanPam as $item)
                  <tr class="odd gradeX">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_input }}</td>
                    <td>{{ $item->total_parameter }}</td>
                    <td>{{ $item->parameter }}/m3</td>
                    <td>{{ Fungsi::rupiah($item->nominal) }}</td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }


  function setTodayDate() {
    const inputTanggal = document.getElementById('tanggal');
    const today = new Date().toISOString().split('T')[0];
    inputTanggal.value = today;
  }

  window.onload = setTodayDate;
</script>
