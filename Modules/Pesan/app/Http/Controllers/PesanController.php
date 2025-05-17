<?php

namespace Modules\Pesan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);
    $userLogin = Auth::user();
    $title = "Pesan";

    $data = DB::table('pesans')
      ->where('user_id', $userLogin->id)
      ->orderBy('created_at', 'desc')
      ->get();

    return view(
      'pesan::/pesan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function show($id)
  {
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);
    $userLogin = Auth::user();
    $title = "Pesan";

    $data = DB::table('pesans')
      ->where('user_id', $userLogin->id)
      ->orderBy('created_at', 'desc')
      ->get();

    // Update read_at
    DB::table('pesans')
      ->where('user_id', $userLogin->id)
      ->where('id', $id)
      ->update([
        'read_at' => Carbon::now(),
      ]);

    $data_detail = DB::table('pesans as a')
      ->join('users as b', 'a.user_id', '=', 'b.id')
      ->where('a.user_id', $userLogin->id)
      ->where('a.id', $id)
      ->first();


    // dd($data_detail);

    return view(
      'pesan::/pesan/show',
      [
        'title' => $title,
        'data' => $data,
        'data_detail' => $data_detail,
      ]
    );
  }



}
