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
            @csrf
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group mb-2">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama"
                    value="{{ $data->nama }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" required id="nik" placeholder="NIK"
                    oninput="numberInput(this)" value="{{ $data->nik }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="alamat">Alamat / Blok</label>
                  <textarea class="form-control" name="alamat" required id="alamat" placeholder="Alamat/Blok">{{ $data->alamat }}</textarea>
                </div>

                <div class="form-group mb-2">
                  <label for="status_perkawinan">Status Perkawinan</label>
                  <select class="form-select" name="status_perkawinan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Belum Menikah" {{ $data->status_perkawinan == 'Belum Menikah' ? 'selected' : '' }}>
                      Belum Menikah</option>
                    <option value="Menikah" {{ $data->status_perkawinan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Cerai Hidup" {{ $data->status_perkawinan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai
                      Hidup</option>
                    <option value="Cerai Mati" {{ $data->status_perkawinan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati
                    </option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="status_keluarga">Status Dalam Keluarga</label>
                  <select class="form-select" name="status_keluarga" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Kepala Keluarga" {{ $data->status_keluarga == 'Kepala Keluarga' ? 'selected' : '' }}>
                      Kepala Keluarga</option>
                    <option value="Suami" {{ $data->status_keluarga == 'Suami' ? 'selected' : '' }}>Suami</option>
                    <option value="Istri" {{ $data->status_keluarga == 'Istri' ? 'selected' : '' }}>Istri</option>
                    <option value="Anak" {{ $data->status_keluarga == 'Anak' ? 'selected' : '' }}>Anak</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="telp">Telpon WhatsApp</label>
                  <input type="text" class="form-control" required name="telp" id="telp" placeholder="085xxx"
                    oninput="numberInput(this)" value="{{ $data->telp }}" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6">

                <div class="form-group mb-2">
                  <label for="jk">Jenis Kelamin</label>
                  <select class="form-select" name="jk" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Laki-laki" {{ $data->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $data->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="kota_kelahiran">Kota Kelahiran</label>
                  <input type="text" class="form-control" name="kota_kelahiran" required id="kota_kelahiran"
                    placeholder="Kota kelahiran" value="{{ $data->kota_kelahiran }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" required name="tgl_lahir" id="tgl_lahir"
                    value="{{ $data->tgl_lahir }}" />
                </div>

                <div class="form-group mb-2">
                  <label for="agama">Agama</label>
                  <select class="form-select" name="agama" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ $data->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Budha" {{ $data->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                  </select>
                </div>

                <div class="form-group mb-2">
                  <label for="pendidikan">Pendidikan</label>
                  <select class="form-select" name="pendidikan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="SD/Sederajat" {{ $data->pendidikan == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat
                    </option>
                    <option value="SMP/Sederajat" {{ $data->pendidikan == 'SMP/Sederajat' ? 'selected' : '' }}>
                      SMP/Sederajat</option>
                    <option value="SMA/Sederajat" {{ $data->pendidikan == 'SMA/Sederajat' ? 'selected' : '' }}>
                      SMA/Sederajat</option>
                    <option value="D3/Sederajat" {{ $data->pendidikan == 'D3/Sederajat' ? 'selected' : '' }}>
                      D3/Sederajat</option>
                    <option value="S1/Sederajat" {{ $data->pendidikan == 'S1/Sederajat' ? 'selected' : '' }}>
                      S1/Sederajat</option>
                    <option value="S2/Sederajat" {{ $data->pendidikan == 'S2/Sederajat' ? 'selected' : '' }}>
                      S2/Sederajat</option>
                    <option value="S3/Sederajat" {{ $data->pendidikan == 'S3/Sederajat' ? 'selected' : '' }}>
                      S3/Sederajat</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="pekerjaan">Pekerjaan</label>
                  <select class="form-select" name="pekerjaan" aria-label="Default select example">
                    <option disabled selected> - pilih - </option>
                    <option value="Pegawai Negeri Sipil (PNS)"
                      {{ $data->pekerjaan == 'Pegawai Negeri Sipil (PNS)' ? 'selected' : '' }}>Pegawai Negeri Sipil (PNS)
                    </option>
                    <option value="Karyawan Swasta" {{ $data->pekerjaan == 'Karyawan Swasta' ? 'selected' : '' }}>
                      Karyawan Swasta</option>
                    <option value="Wiraswasta / Pengusaha"
                      {{ $data->pekerjaan == 'Wiraswasta / Pengusaha' ? 'selected' : '' }}>Wiraswasta / Pengusaha
                    </option>
                    <option value="Petani" {{ $data->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                    <option value="Nelayan" {{ $data->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                    <option value="Buruh / Pekerja Lepas"
                      {{ $data->pekerjaan == 'Buruh / Pekerja Lepas' ? 'selected' : '' }}>Buruh / Pekerja Lepas</option>
                    <option value="Guru / Dosen" {{ $data->pekerjaan == 'Guru / Dosen' ? 'selected' : '' }}>Guru / Dosen
                    </option>
                    <option value="Dokter / Tenaga Medis"
                      {{ $data->pekerjaan == 'Dokter / Tenaga Medis' ? 'selected' : '' }}>Dokter / Tenaga Medis</option>
                    <option value="TNI / Polri" {{ $data->pekerjaan == 'TNI / Polri' ? 'selected' : '' }}>TNI / Polri
                    </option>
                    <option value="Ojek Online / Sopir"
                      {{ $data->pekerjaan == 'Ojek Online / Sopir' ? 'selected' : '' }}>Ojek Online / Sopir</option>
                    <option value="Ibu Rumah Tangga" {{ $data->pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu
                      Rumah Tangga</option>
                    <option value="Mahasiswa / Pelajar"
                      {{ $data->pekerjaan == 'Mahasiswa / Pelajar' ? 'selected' : '' }}>Mahasiswa / Pelajar</option>
                    <option value="Pensiunan" {{ $data->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                    <option value="Teknisi / Mekanik" {{ $data->pekerjaan == 'Teknisi / Mekanik' ? 'selected' : '' }}>
                      Teknisi / Mekanik</option>
                    <option value="Seniman / Pekerja Kreatif"
                      {{ $data->pekerjaan == 'Seniman / Pekerja Kreatif' ? 'selected' : '' }}>Seniman / Pekerja Kreatif
                    </option>
                    <option value="Programmer / IT Specialist"
                      {{ $data->pekerjaan == 'Programmer / IT Specialist' ? 'selected' : '' }}>Programmer / IT Specialist
                    </option>
                    <option value="Pengacara / Notaris"
                      {{ $data->pekerjaan == 'Pengacara / Notaris' ? 'selected' : '' }}>Pengacara / Notaris</option>
                    <option value="Akuntan / Konsultan Keuangan"
                      {{ $data->pekerjaan == 'Akuntan / Konsultan Keuangan' ? 'selected' : '' }}>Akuntan / Konsultan
                      Keuangan</option>
                    <option value="Pedagang / Penjual" {{ $data->pekerjaan == 'Pedagang / Penjual' ? 'selected' : '' }}>
                      Pedagang / Penjual</option>
                    <option value="Lainnya" {{ $data->pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                  </select>
                </div>

                <div class="card-action">
                  <input type="hidden" name="id" value="{{ $data->id }}">
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
