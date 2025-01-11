<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

  public function index()
  {
    $imagickStatus = extension_loaded('imagick')
      ? "Imagick extension is installed and enabled!"
      : "Imagick extension is not enabled.";

    return view('dashboard::index', compact('imagickStatus'));
  }
}
