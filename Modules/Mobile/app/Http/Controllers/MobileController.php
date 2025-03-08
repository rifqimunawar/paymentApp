<?php

namespace Modules\Mobile\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Keluarga\Models\Keluarga;
use Modules\Pembayaran\Models\Pembayaran;

class MobileController extends Controller
{
  public function home()
  {
    $userLogin = Auth::user();

    $tagihan_rutin_belum_dibayar = Warga::rutinBelumDibayar($userLogin->warga_id);
    $pam_belum_dibayar = Warga::pamBelumDibayar($userLogin->warga_id);
    $ronda_belum_dibayar = Warga::RondaBelumDibayar($userLogin->warga_id);


    $tagihan_rutin = 0;
    $pam = 0;
    $ronda = 0;

    foreach ($tagihan_rutin_belum_dibayar as $item) {
      $tagihan_rutin += $item->nominal;
    }

    foreach ($pam_belum_dibayar as $item) {
      $pam += $item->nominal;
    }

    foreach ($ronda_belum_dibayar as $item) {
      $ronda += $item->nominal_tagihan;
    }

    $total_tagihan_rutin = $tagihan_rutin;
    $total_pam = $pam;
    $total_ronda = $ronda;
    // Total keseluruhan
    $total_semua = $tagihan_rutin + $pam + $ronda;

    $history = Pembayaran::where('warga_id', $userLogin->warga_id)->latest()->get();

    // return $history;
    return view('mobile::home', [
      'data' => $userLogin,
      'tagihan_rutin_belum_dibayar' => $tagihan_rutin_belum_dibayar,
      'pam_belum_dibayar' => $pam_belum_dibayar,
      'ronda_belum_dibayar' => $ronda_belum_dibayar,
      'total_tagihan_rutin' => $total_tagihan_rutin,
      'total_ronda' => $total_ronda,
      'total_semua' => $total_semua,
      'total_pam' => $total_pam,
      'history' => $history
    ]);
  }

  public function tagihan()
  {
    $userLogin = Auth::user();
    $history = Pembayaran::where('warga_id', $userLogin->warga_id)->latest()->get();
    return view('mobile::tagihan', [
      'history' => $history
    ]);
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
  public function keluarga()
  {
    $userLogin = Auth::user();
    $data['kepala'] = Warga::cari_warga($userLogin->warga_id);
    $data['anggota'] = Keluarga::with('warga')->where('warga_id', $userLogin->warga_id)->get();
    return view('mobile::keluarga', [
      'data' => $data
    ]);
  }
  public function settings()
  {
    return view('mobile::settings');
  }
  // Fitur eksklusif ini hanya tersedia di versi Premium! Tingkatkan aplikasi Anda sekarang untuk pengalaman terbaik dan akses fitur unggulan!
}
