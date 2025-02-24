@extends('master::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <form action="{{ route('warga.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
              @csrf
              <div class="col-md-6 col-lg-6">
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
                  <label for="status_perkawinan">Status Perkawinan</label>
                  <select class="form-select" name="status_perkawinan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="status_keluarga">Status Dalam Keluarga</label>
                  <select class="form-select" name="status_keluarga" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                    <option value="Suami">Suami</option>
                    <option value="Istri">Istri</option>
                    <option value="Anak">Anak</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="telp">Telpon WhatsApp</label>
                  <input type="text" class="form-control" required name="telp" id="telp" placeholder="085xxx"
                    oninput="numberInput(this)" />
                </div>

              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group mb-2">
                  <label for="jk">Jenis Kelamin</label>
                  <select class="form-select" name="jk" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="kota_kelahiran">Kota Kelahiran</label>
                  <input type="text" class="form-control" name="kota_kelahiran" required id="kota_kelahiran"
                    placeholder="Kota kelahiran" />
                </div>
                <div class="form-group mb-2">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" required name="tgl_lahir" id="tgl_lahir"
                    placeholder="085xxx" />
                </div>
                <div class="form-group mb-2">
                  <label for="agama">Agama</label>
                  <select class="form-select" name="agama" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="pendidikan">Pendidikan</label>
                  <select class="form-select" name="pendidikan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="SD/Sederajat">SD/Sederajat</option>
                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                    <option value="D3/Sederajat">D3/Sederajat</option>
                    <option value="S1/Sederajat">S1/Sederajat</option>
                    <option value="S2/Sederajat">S2/Sederajat</option>
                    <option value="S3/Sederajat">S3/Sederajat</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="pekerjaan">Pekerjaan</label>
                  <select class="form-select" name="pekerjaan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Wiraswasta / Pengusaha">Wiraswasta / Pengusaha</option>
                    <option value="Petani">Petani</option>
                    <option value="Nelayan">Nelayan</option>
                    <option value="Buruh / Pekerja Lepas">Buruh / Pekerja Lepas</option>
                    <option value="Guru / Dosen">Guru / Dosen</option>
                    <option value="Dokter / Tenaga Medis">Dokter / Tenaga Medis</option>
                    <option value="TNI / Polri">TNI / Polri</option>
                    <option value="Ojek Online / Sopir">Ojek Online / Sopir</option>
                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                    <option value="Mahasiswa / Pelajar">Mahasiswa / Pelajar</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Teknisi / Mekanik">Teknisi / Mekanik</option>
                    <option value="Seniman / Pekerja Kreatif">Seniman / Pekerja Kreatif</option>
                    <option value="Programmer / IT Specialist">Programmer / IT Specialist</option>
                    <option value="Pengacara / Notaris">Pengacara / Notaris</option>
                    <option value="Akuntan / Konsultan Keuangan">Akuntan / Konsultan Keuangan</option>
                    <option value="Pedagang / Penjual">Pedagang / Penjual</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>

                <div class="card-action">
                  <input type="hidden" name="id">
                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                  <a href="{{ route('warga.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
              </div>
            </div>
          </form>
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
