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
            <form action="{{ route('warga.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12 col-lg-12">
                <div class="form-group mb-2">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama" />
                </div>
                <div class="form-group mb-2">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" required id="nik" placeholder="NIK"
                    oninput="numberInput(this)" />
                </div>
                <div class="form-group mb-2">
                  <label for="alamat">Alamat / Blok</label>
                  <textarea class="form-control" name="alamat" required id="alamat" placeholder="Alamat/Blok"></textarea>
                </div>



                <!-- Dropdown Provinsi -->
                {{-- <div class="form-group mb-2">
                  <label for="prov">Provinsi</label>
                  <select class="default-select2 form-control" name="prov" id="provinsi" required>
                    <option value="" selected disabled>Pilih Provinsi</option>
                    @foreach ($data['provinsi'] as $prov)
                      <option value="{{ $prov->prov_kode }}">{{ $prov->prov_name }}</option>
                    @endforeach
                  </select>
                </div> --}}

                <!-- Dropdown Kabupaten -->
                {{-- <div class="form-group mb-2">
                  <label for="kota">Kabupaten / Kota</label>
                  <select class="default-select2 form-control" name="kab" id="kota" required>
                    <option>Pilih</option>
                  </select>
                </div> --}}

                <!-- Dropdown Kecamatan -->
                {{-- <div class="form-group mb-2">
                  <label for="kec">Kecamatan</label>
                  <select class="default-select2 form-control" name="kec" id="kecamatan" required>
                    <option>Pilih</option>
                  </select>
                </div> --}}

                <!-- Dropdown Kelurahan -->
                {{-- <div class="form-group mb-2">
                  <label for="kel">Kelurahan</label>
                  <select class="default-select2 form-control" name="kel" id="desa" required>
                    <option>Pilih</option>
                  </select>
                </div> --}}


                <div class="form-group mb-2">
                  <label for="telp">Telpon WhatsApp</label>
                  <input type="text" class="form-control" required name="telp" id="telp" placeholder="085xxx"
                    oninput="numberInput(this)" />
                </div>

                <div class="card-action">
                  <input type="hidden" name="id">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('warga.index') }}" class="btn btn-warning btn-sm">Kembali</a>
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
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }

  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
          'content')
      }
    });

    $('#provinsi').on('change', function() {
      let provId = $(this).val();
      console.log("provId:" + provId)
      if (provId) {
        $.ajax({
          url: '{{ route('getKab', ':prov_id') }}'.replace(':prov_id', provId),
          type: 'GET',
          success: function(data) {
            console.log("Data Kab:", data);
            $('#kota').empty();
            $('#kota').append(
              '<option value="" selected disabled>Pilih Kabupaten / Kota</option>'
            );
            $.each(data, function(index, kabupaten) {
              $('#kota').append('<option value="' + kabupaten
                .kab_kode + '">' + kabupaten.kab_name +
                '</option>');
            });
          }
        });
      }
    });

    $('#kota').on('change', function() {
      let kabId = $(this).val();
      console.log("kabId:" + kabId)
      if (kabId) {
        $.ajax({
          url: '{{ route('getKec', ':kab_id') }}'.replace(':kab_id', kabId),
          type: 'GET',
          success: function(data) {
            console.log("Data Kec:", data);

            $('#kecamatan').empty();
            $('#kecamatan').append(
              '<option value="" selected disabled>Pilih Kecamatan</option>'
            );
            $.each(data, function(index, kecamatan) {
              $('#kecamatan').append('<option value="' + kecamatan
                .kec_kode + '">' + kecamatan.kec_name +
                '</option>');
            });
          }
        });
      }
    });

    $('#kecamatan').on('change', function() {
      let kecId = $(this).val();
      console.log("kecId:" + kecId)
      if (kecId) {
        $.ajax({
          url: '{{ route('getKel', ':kec_id') }}'.replace(':kec_id', kecId),
          type: 'GET',
          success: function(data) {
            $('#desa').empty();
            $('#desa').append(
              '<option value="" selected disabled>Pilih Desa</option>'
            );
            $.each(data, function(index, desa) {
              $('#desa').append('<option value="' + desa.kel_kode +
                '">' +
                desa.kel_name + '</option>');
            });
          }
        });
      }
    });
  });
</script>
