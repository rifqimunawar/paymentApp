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
                  <input type="text" class="form-control" name="biaya_pam" required id="biaya_pam"
                    value="{{ $data->biaya_pam ?? '' }}" placeholder="Biaya Pam/m³" oninput="formatRupiah(this)" />
                </div>

                <div class="form-group mb-2">
                  <label for="denda_ronda">Denda Ronda / Malam</label>
                  <input type="text" class="form-control" name="denda_ronda" required id="denda_ronda"
                    value="{{ $data->denda_ronda ?? '' }}" placeholder="Denda ronda / malam"
                    oninput="formatRupiah(this)" />
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
  function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, ''); // Hapus semua karakter selain angka
    let formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
    }).format(value); // Format sebagai Rupiah
    input.value = formatted.replace('Rp', 'Rp '); // Pastikan 'Rp' terpasang
  }

  function validateNumberInput(event) {
    // Dapatkan karakter yang dimasukkan
    const charCode = (event.which) ? event.which : event.keyCode;

    // Jika karakter yang dimasukkan bukan angka, batalkan input
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      event.preventDefault();
      return false;
    }
    return true;
  }
</script>
