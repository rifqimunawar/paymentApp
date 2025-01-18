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
                  <label for="telp">Telpon WhatsApp</label>
                  <input type="text" class="form-control" required name="telp" id="telp" placeholder="085xxx"
                    oninput="numberInput(this)" value="{{ $data->telp }}" />
                </div>

                <div class="card-action">
                  <input type="hidden" name="id" value="{{ $data->id }}">
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
