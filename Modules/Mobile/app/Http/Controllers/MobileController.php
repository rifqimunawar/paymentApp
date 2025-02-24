<?php

namespace Modules\Mobile\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MobileController extends Controller
{
  public function home()
  {
    // $data['warga'] = Warga::all();

    $userLogin = Auth::user()->load([
      'warga.tagihans.pembayaran',
      'warga.tagihanPam.pembayaran',
      'warga.periodes'
    ]);


    // return $userLogin;
    return view('mobile::home');
  }

  public function tagihan()
  {
    return view('mobile::tagihan');
  }
  public function ronda()
  {
    return view('mobile::ronda');
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
