<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

  public function index()
  {
    Fungsi::hakAkses('/');
    return view('dashboard::index');
  }
}
