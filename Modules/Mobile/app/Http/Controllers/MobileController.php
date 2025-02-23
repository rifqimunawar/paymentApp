<?php

namespace Modules\Mobile\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MobileController extends Controller
{
  public function home()
  {
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
}
