<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use App\Http\Controllers\Controller;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;

class DashboardController extends Controller
{

  public function index()
  {
    // setiap login lakukan pengecekan tagihan ronda START
    $hari_ini = Carbon::today();
    $jadwal_ronda_warga = Ronda::with(['wargas', 'absens'])->get();
    $nominal_denda_ronda = Parameter::first()->denda_ronda;
    $hasil = [];
    foreach ($jadwal_ronda_warga as $ronda) {
      $tanggal_ronda = Carbon::parse($ronda->tanggal_ronda);
      $ronda_id = $ronda->id;
      foreach ($ronda->wargas as $warga) {
        $nama_warga = $warga->nama;
        $warga_id = $warga->id;
        $absen = $ronda->absens->where('warga_id', $warga->id)->first();
        $status_absen = $absen ? $absen->absen : null;
        $hasil[] = [
          'ronda_id' => $ronda_id,
          'warga_id' => $warga_id,
          'tanggal_ronda' => $tanggal_ronda,
          'nama_warga' => $nama_warga,
          'status_absen' => $status_absen,
        ];
        if ($hari_ini > $tanggal_ronda && $status_absen == 1) {
          $cek_tagihan = TagihanRonda::where('ronda_id', $ronda_id)
            ->where('warga_id', $warga_id)
            ->exists();
          if (!$cek_tagihan) {
            TagihanRonda::create([
              'ronda_id' => $ronda_id,
              'warga_id' => $warga_id,
              'tgl_absen_ronda' => $tanggal_ronda,
              'nominal_tagihan' => $nominal_denda_ronda,
            ]);
          }
        }
      }
    }
    // setiap login lakukan pengecekan tagihan ronda END

    return view('dashboard::index');
  }
}
