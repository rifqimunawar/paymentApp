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

    $data = Warga::with(['umums', 'tagihanPam', 'absens'])->latest()->get();

    // Membuat tabel HTML
    $htmlTable = '<table border="1" cellspacing="0" cellpadding="5" style="width:100%; border-collapse: collapse;">';
    $htmlTable .= '
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tagihan Umum</th>
                <th>Tagihan PAM</th>
                <th>Absen Ronda</th>
            </tr>
        </thead>
        <tbody>
    ';

    foreach ($data as $index => $item) {
      $tagihanUmum = '';
      foreach ($item->umums as $umum) {
        $tagihanUmum .= $umum->nama_tagihan . ' - Rp' . number_format($umum->nominal, 0, ',', '.') . '<br>';
      }

      $tagihanPam = '';
      foreach ($item->tagihanPam as $tagihan) {
        $tagihanPam .= Fungsi::rupiah($tagihan->nominal) . '<br>';
      }

      $absensi = '';
      foreach ($item->absens as $absen) {
        $absensi .= $absen->tanggal_absen_ronda . ' - ' . $absen->nominal_tagihan . '<br>';
      }

      $htmlTable .= "
            <tr>
                <td>" . ($index + 1) . "</td>
                <td>" . $item->nama . "</td>
                <td>" . $tagihanUmum . "</td>
                <td>" . $tagihanPam . "</td>
                <td>" . $absensi . "</td>
            </tr>
        ";
    }

    $htmlTable .= '</tbody></table>';

    return $htmlTable;
    // return view('warga.index', compact('htmlTable'));


    // return $data;
    // return view(
    //   'pembayaran::/pembayaran/index',
    //   [
    //     'title' => $title,
    //     'data' => $data,
    //   ]
    // );
  }
}
