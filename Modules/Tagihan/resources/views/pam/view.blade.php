@extends('tagihan::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <table>
              <tr>
                <td>
                  Nama
                </td>
                <td>
                  :
                </td>
                <td>
                  Rifqi Munawar
                </td>
              </tr>
              <tr>
                <td>
                  Alamat
                </td>
                <td>
                  :
                </td>
                <td>
                  Bandung
                </td>
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
                  <label for="tanggal">Tanggal</label>
                  <input type="date" readonly class="form-control" name="tanggal" required id="tanggal"
                    placeholder="tanggal" />
                </div>

                {{-- <div class="form-group mb-2">
                  <div class="input-grup">
                    <label for="nik">Parameter </label>
                    <input type="text" class="form-control" name="nik" required id="nik" placeholder=""
                      oninput="numberInput(this)" /> <span class="input-group-text">.Kubik</span>
                  </div>
                </div> --}}

                <label for="">Parameter hari ini</label>
                <div class="input-group mb-3">
                  <input oninput="numberInput(this)" type="text" class="form-control" />
                  <span class="input-group-text">.Kubik</span>
                </div>

                <div class="card-action">
                  <input type="hidden" name="id" value="{{ $data->id }}">
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
          <div class="card-body">
            <div class="panel-body">
              <table id="data-table-default" width="100%"
                class="table table-striped table-bordered align-middle text-nowrap">
                <thead>
                  <tr>
                    <th width="1%"></th>
                    <th class="text-nowrap">Periode</th>
                    <th class="text-nowrap">Parameter</th>
                    <th class="text-nowrap">Nominal</th>
                    <th class="text-nowrap">Satus</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd gradeX">
                    <td>1</td>
                    <td>1 Januari - 31 Januari </td>
                    <td>50 kubik</td>
                    <td>Rp. 50.000</td>
                    <td>
                      <p class="btn btn-sm btn-primary">Lunas</p>
                    </td>
                  </tr>
                  <tr class="odd gradeX">
                    <td>2</td>
                    <td>1 Februari - 28 Februari </td>
                    <td>50 kubik</td>
                    <td>Rp. 50.000</td>
                    <td>
                      <p class="btn btn-sm btn-primary">Lunas</p>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
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

  function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    let formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
    }).format(value);
    input.value = formatted.replace('Rp', 'Rp ');
  }

  function cleanRupiah(value) {
    return value.replace(/[^0-9]/g, '');
  }

  function setTodayDate() {
    const inputTanggal = document.getElementById('tanggal');
    const today = new Date().toISOString().split('T')[0];
    inputTanggal.value = today;
  }

  window.onload = setTodayDate;
</script>
