@extends('master::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('parameter.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="nama">Nama Ketua RT</label>
                  <input type="text" class="form-control" required name="nama_rt" id="nama_rt"
                    placeholder="Nama lengkap dengan gelar" value="{{ $data->nama_rt ?? '' }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="biaya_pam">Biaya Pam (m³)</label>
                  <input type="text" class="form-control" required id="biaya_pam_display"
                    value="{{ $data->biaya_pam ?? '' }}" placeholder="Biaya Pam/m³"
                    oninput="formatCurrency(this, 'biaya_pam')" />

                  <input type="hidden" name="biaya_pam" id="biaya_pam" value="{{ $data->biaya_pam ?? '' }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="denda_ronda">Denda Ronda / Malam</label>
                  <input type="text" class="form-control" required id="denda_ronda_display"
                    value="{{ $data->denda_ronda ?? '' }}" placeholder="Denda ronda / malam"
                    oninput="formatCurrency(this, 'denda_ronda')" />
                  <input type="hidden" name="denda_ronda" id="denda_ronda" value="{{ $data->denda_ronda ?? '' }}" />
                </div>


                <div class="form-group mb-2">
                  <label for="latitude_ronda">Latitude</label>
                  <input type="text" class="form-control" required name="latitude_ronda" id="latitude_ronda"
                    placeholder="latitude tikoordinat ronda" value="{{ $data->latitude_ronda ?? '' }}" />
                </div>
                <div class="form-group mb-2">
                  <label for="longitude_ronda">Longitude</label>
                  <input type="text" class="form-control" required name="longitude_ronda" id="longitude_ronda"
                    placeholder="longitude tikoordinat ronda" value="{{ $data->longitude_ronda ?? '' }}" />
                </div>
                <div class="form-group mb-2">
                  <label for="jam_awal_ronda">Jam Awal Ronda</label>
                  <input type="time" class="form-control" required name="jam_awal_ronda" id="jam_awal_ronda"
                    placeholder="waktu minimal absen ronda" value="{{ $data->jam_awal_ronda ?? '' }}" />
                </div>
                <div class="card-action">
                  <input type="hidden" name="id" value="1">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  function formatCurrency(input, hiddenFieldId) {
    let value = input.value.replace(/[^0-9]/g, '');

    if (value.length > 0) {
      let formatted = parseInt(value, 10).toLocaleString('id-ID');
      input.value = `Rp ${formatted}`;
      document.getElementById(hiddenFieldId).value = value;
    } else {
      input.value = '';
      document.getElementById(hiddenFieldId).value = '';
    }
  }
</script>
