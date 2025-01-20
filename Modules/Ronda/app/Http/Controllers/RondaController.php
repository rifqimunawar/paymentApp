<?php

namespace Modules\Ronda\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RondaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function jadwal()
  {
    Fungsi::hakAkses('/ronda/jadwal');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = '';
    $data = Ronda::latest()->get();
    // dd($data);
    return view(
      'ronda::/ronda/jadwal',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  // ===========================================
  public function index()
  {
    Fungsi::hakAkses('/ronda/jadwalkan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Jadwal Ronda Malam';
    $data = Ronda::latest()->get();

    return view(
      'ronda::/ronda/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/ronda/jadwalkan');

    $data_warga = Warga::latest()->get();
    $title = "Jadwal Ronda";
    return view(
      'ronda::ronda/create',
      [
        'title' => $title,
        'data_warga' => $data_warga
      ]
    );
  }

  public function store(Request $request)
  {
    // Validasi input
    $request->validate([
      'tanggal_ronda' => 'required|date|unique:rondas,tanggal_ronda',
    ], [
      'tanggal_ronda.unique' => 'Tanggal sudah diisi, pilih tanggal lain.',
    ]);

    // dd($request);
    // $data = $request->all();
    $data = $request->except('warga_id');

    // Proses jika ada file gambar
    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'Ronda' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Jika ada id untuk update
    if (!empty($request->id)) {
      $updateData = Ronda::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);

      // Ambil warga_id dari frontend
      $wargaIds = $request->warga_id; // Menggunakan warga_id yang dikirim dari frontend
      if (!empty($wargaIds)) {
        $updateData->wargas()->sync($wargaIds); // Menghubungkan warga dengan ronda
      }

      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('jadwalkan.index');
    }

    // Jika tidak ada id untuk update, buat data baru
    $data['created_by'] = Auth::user()->username;
    $newRonda = Ronda::create($data);

    // Ambil warga_id dari frontend dan sinkronkan
    $wargaIds = $request->warga_id; // Menggunakan warga_id yang dikirim dari frontend
    if (!empty($wargaIds)) {
      $newRonda->wargas()->sync($wargaIds); // Menghubungkan warga dengan ronda
    }

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('jadwalkan.index');
  }

  public function edit($id)
  {
    $title = "Update Data Warga";
    Fungsi::hakAkses('/ronda/jadwalkan');
    $warga = Warga::findOrFail($id);

    return view(
      'ronda::warga.edit',
      [
        'data' => $warga,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/ronda/jadwalkan');

    $data = Warga::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data warga');
    //   return redirect()->route('warga.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('warga.index');
  }

}
