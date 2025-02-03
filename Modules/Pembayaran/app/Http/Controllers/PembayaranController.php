<?php

namespace Modules\Pembayaran\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Master\Models\Warga;

class PembayaranController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pembayaran');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Pembayaran';

    $data = Warga::with(['absens.ronda', 'rondas'])->latest()->get();

    $response = [];

    foreach ($data as $index => $item) {
      $totalTagihanUmum = 0;
      foreach ($item->umums as $umum) {
        $totalTagihanUmum += $umum->nominal;
      }
      $tagihanUmum = Fungsi::rupiah($totalTagihanUmum);

      $totalTagihanPam = 0;
      foreach ($item->tagihanPam as $tagihan) {
        $totalTagihanPam += $tagihan->nominal;
      }
      $tagihanPamTotalFormatted = Fungsi::rupiah($totalTagihanPam);

      $jml_tdk_ronda = $item->absens->where('absen', 1)->count();
      $nominal_denda_ronda = $jml_tdk_ronda * 20000;

      $totalTagihan = $totalTagihanUmum + $totalTagihanPam + $nominal_denda_ronda;

      $response[] = [
        'warga_id' => $item->id,
        'nama_warga' => $item->nama,
        'total_tagihan' => Fungsi::rupiah($totalTagihan),
        'tagihan_umum' => $tagihanUmum,
        'tagihan_pam' => $tagihanPamTotalFormatted,
        'jml_tdk_ronda' => $jml_tdk_ronda,
        'nominal_denda_ronda' => Fungsi::rupiah($nominal_denda_ronda)
      ];
    }

    // dd($response);
    // return $data;
    return view(
      'pembayaran::/pembayaran/index',
      [
        'title' => $title,
        'data' => $response,
      ]
    );
  }

}
