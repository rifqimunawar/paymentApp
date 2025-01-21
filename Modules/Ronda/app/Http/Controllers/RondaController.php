<?php

namespace Modules\Ronda\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Ronda\Models\RondaAbsen;
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
    $data = Ronda::with('wargas')->latest()->get();
    dd($data);
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
    $data = Ronda::with(['wargas', 'absens'])->latest()->get();

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
    $request->validate([
      'tanggal_ronda' => 'required|date|unique:rondas,tanggal_ronda',
    ], [
      'tanggal_ronda.unique' => 'Tanggal sudah diisi, pilih tanggal lain.',
    ]);
    $data = $request->except('warga_id');

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'Ronda' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Ronda::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);
      $wargaIds = $request->warga_id;
      if (!empty($wargaIds)) {
        $updateData->wargas()->sync($wargaIds);
        foreach ($wargaIds as $wargaId) {
          RondaAbsen::updateOrCreate(
            ['ronda_id' => $updateData->id, 'warga_id' => $wargaId],
            ['absen' => 0, 'created_by' => Auth::user()->username]
          );
        }
      }
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('jadwalkan.index');
    }

    $data['created_by'] = Auth::user()->username;
    $newRonda = Ronda::create($data);
    $wargaIds = $request->warga_id;
    if (!empty($wargaIds)) {
      $newRonda->wargas()->sync($wargaIds);
      foreach ($wargaIds as $wargaId) {
        RondaAbsen::create([
          'ronda_id' => $newRonda->id,
          'warga_id' => $wargaId,
          'absen' => 0,
          'created_by' => Auth::user()->username,
        ]);
      }
    }
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('jadwalkan.index');
  }

  public function edit($id)
  {
    $title = "Update Data Warga";
    Fungsi::hakAkses('/ronda/jadwalkan');
    $ronda = Ronda::with('wargas')->findOrFail($id);
    $warga = Warga::latest()->get();
    $selectedWargas = $ronda->wargas->pluck('id')->toArray();
    $data_jadwal_ronda = Ronda::with(['wargas', 'absens'])->latest()->get();

    return view(
      'ronda::ronda.edit',
      [
        'data' => $ronda,
        'data_warga' => $warga,
        'data_jadwal_ronda' => $data_jadwal_ronda,
        'selected_wargas' => $selectedWargas,
        'title' => $title,
      ]
    );
  }

  public function absen(Request $request)
  {
    // Validasi akses
    Fungsi::hakAkses('/ronda/jadwalkan');

    // Ambil data ronda berdasarkan ID
    $ronda = Ronda::findOrFail($request->ronda_id);

    // Proses data kehadiran yang dikirim dari form
    $absenData = $request->input('absen', []); // Ambil data absen, default jika kosong adalah array kosong

    foreach ($absenData as $warga_id => $status) {
      // Cari warga berdasarkan ID
      $warga = Warga::find($warga_id);

      if ($warga) {
        // Update status hadir (1 = tidak hadir, 2 = hadir)
        $rondaAbsen = RondaAbsen::updateOrCreate(
          ['ronda_id' => $ronda->id, 'warga_id' => $warga_id],
          ['absen' => $status]
        );
      }
    }

    // Redirect atau tampilkan feedback
    return redirect()->route('jadwalkan.index')->with('success', 'Absensi berhasil disimpan!');
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
