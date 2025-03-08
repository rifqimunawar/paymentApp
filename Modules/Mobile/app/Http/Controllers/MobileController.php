<?php

namespace Modules\Mobile\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MobileController extends Controller
{
  public function home()
  {
    $userLogin = Auth::user();

    $tagihan_rutin_belum_dibayar = Warga::rutinBelumDibayar($userLogin->warga_id);
    $pam_belum_dibayar = Warga::pamBelumDibayar($userLogin->warga_id);
    $ronda_belum_dibayar = Warga::RondaBelumDibayar($userLogin->warga_id);


    $total_tagihan_rutin = 0;
    $total_pam = 0;
    $total_ronda = 0;

    foreach ($tagihan_rutin_belum_dibayar as $item) {
      $total_tagihan_rutin += $item->nominal;
    }

    foreach ($pam_belum_dibayar as $item) {
      $total_pam += $item->nominal;
    }

    foreach ($ronda_belum_dibayar as $item) {
      $total_ronda += $item->nominal_tagihan;
    }

    // Total keseluruhan
    $total_semua = $total_tagihan_rutin + $total_pam + $total_ronda;



    // return $ronda_belum_dibayar;
    return view('mobile::home', [
      'data' => $userLogin,
      'tagihan_rutin_belum_dibayar' => $tagihan_rutin_belum_dibayar,
      'pam_belum_dibayar' => $pam_belum_dibayar,
      'ronda_belum_dibayar' => $ronda_belum_dibayar,
      'total_semua' => $total_semua
    ]);
  }

  public function tagihan()
  {
    return view('mobile::tagihan');
  }
  public function ronda()
  {
    $data = Ronda::with('wargas')->get();
    // Filter data hanya untuk tanggal hari ini
    $ronda_hari_ini = $data->where('tanggal_ronda', Carbon::today()->toDateString());

    // return $ronda_hari_ini;
    return view('mobile::ronda', [
      'ronda_hari_ini' => $ronda_hari_ini
    ]);
  }
  public function history()
  {
    return view('mobile::history');
  }
  public function settings()
  {
    return view('mobile::settings');
  }
  // Fitur eksklusif ini hanya tersedia di versi Premium! Tingkatkan aplikasi Anda sekarang untuk pengalaman terbaik dan akses fitur unggulan!
}
