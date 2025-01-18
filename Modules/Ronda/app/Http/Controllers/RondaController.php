<?php

namespace Modules\Ronda\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use App\Http\Controllers\Controller;

class RondaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    Fungsi::hakAkses('/ronda/r');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = '';
    $data = Ronda::latest()->get();
    dd($data);
    return view(
      'ronda::/ronda/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

}
