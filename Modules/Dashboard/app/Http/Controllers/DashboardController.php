<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;
use Modules\Pembayaran\Models\Pembayaran;

class DashboardController extends Controller
{

  public function index()
  {
    // setiap login lakukan pengecekan tagihan ronda START
    $hari_ini = Carbon::today();
    $jadwal_ronda_warga = Ronda::with(['wargas', 'absens'])->get();
    $nominal_denda_ronda = Parameter::first()->denda_ronda;
    $hasil = [];
    foreach ($jadwal_ronda_warga as $ronda) {
      $tanggal_ronda = Carbon::parse($ronda->tanggal_ronda);
      $ronda_id = $ronda->id;
      foreach ($ronda->wargas as $warga) {
        $nama_warga = $warga->nama;
        $warga_id = $warga->id;
        $absen = $ronda->absens->where('warga_id', $warga->id)->first();
        $status_absen = $absen ? $absen->absen : null;
        $hasil[] = [
          'ronda_id' => $ronda_id,
          'warga_id' => $warga_id,
          'tanggal_ronda' => $tanggal_ronda,
          'nama_warga' => $nama_warga,
          'status_absen' => $status_absen,
        ];
        if ($hari_ini > $tanggal_ronda && $status_absen == 1) {
          $cek_tagihan = TagihanRonda::where('ronda_id', $ronda_id)
            ->where('warga_id', $warga_id)
            ->exists();
          if (!$cek_tagihan) {
            TagihanRonda::create([
              'ronda_id' => $ronda_id,
              'warga_id' => $warga_id,
              'tgl_absen_ronda' => $tanggal_ronda,
              'nominal_tagihan' => $nominal_denda_ronda,
            ]);
          }
        }
      }
    }
    // setiap login lakukan pengecekan tagihan ronda END


    // kebutuhan data untuk dashboard
    $data['last_30_days'] = [];

    for ($i = 0; $i < 30; $i++) {
      $date = Carbon::now()->subDays($i);

      $data['last_30_days'][] = [
        'date' => $date->toDateString(),
        'date_month' => $date->format('M-d'),
        'day' => $date->format('l'),
        'payment_rutin' => Pembayaran::where('pembayaran_tipe', 1)
          ->whereDate('created_at', $date)
          ->sum('nominal_dibayar'),
        'payment_pam' => Pembayaran::where('pembayaran_tipe', 2)
          ->whereDate('created_at', $date)
          ->sum('nominal_dibayar'),
        'payment_ronda' => Pembayaran::where('pembayaran_tipe', 3)
          ->whereDate('created_at', $date)
          ->sum('nominal_dibayar')
      ];
    }

    $startDate = Carbon::now()->subDays(30);
    $endDate = Carbon::now();
    $data['total_warga'] = Warga::count();
    $data['total_pembayaran_rutin'] = Pembayaran::where('pembayaran_tipe', 1)
      ->whereBetween('created_at', [$startDate, $endDate])
      ->sum('nominal_dibayar');
    $data['total_pembayaran_pam'] = Pembayaran::where('pembayaran_tipe', 2)
      ->whereBetween('created_at', [$startDate, $endDate])
      ->sum('nominal_dibayar');
    $data['total_pembayaran_ronda'] = Pembayaran::where('pembayaran_tipe', 3)
      ->whereBetween('created_at', [$startDate, $endDate])
      ->sum('nominal_dibayar');

    return view('dashboard::index', ['data' => $data]);
  }

  public function statistik()
  {
    $data['last_30_days'] = [];


    for ($i = 29; $i >= 0; $i--) {
      $date = Carbon::now()->subDays($i);

      $data['last_30_days'][] = [
        'date' => $date->toDateString(),
        'date_month' => $date->format('M-d'),
        'day' => $date->format('l'),
        'payment_rutin' => Pembayaran::where('pembayaran_tipe', 1)
          ->whereDate('created_at', $date)
          ->sum('nominal_dibayar'),
        'payment_pam' => Pembayaran::where('pembayaran_tipe', 2)
          ->whereDate('created_at', $date)
          ->sum('nominal_dibayar'),
        'payment_ronda' => Pembayaran::where('pembayaran_tipe', 3)
          ->whereDate('created_at', $date)
          ->sum('nominal_dibayar')
      ];
    }

    return $data;
    // Response JSON untuk DataTables
    // return response()->json([
    // 'draw' => $request->input('draw'),
    // 'recordsTotal' => $totalData,
    // 'recordsFiltered' => $totalData,
    // 'data' => $data
    // ]);
  }
}
