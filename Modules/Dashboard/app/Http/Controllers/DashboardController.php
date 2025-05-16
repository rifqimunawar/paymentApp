<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Pesan\Models\Pesan;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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



    // membuat pesan otomatis untuk setiap user ketika telat melakukan pembayaran
    $userLogin = Auth::user();
    $tglHariIni = Carbon::today()->toDateString();

    $listRondaBelumDibayar = Warga::RondaBelumDibayar($userLogin->warga_id);

    foreach ($listRondaBelumDibayar as $ronda) {
      $userByWarga = User::where('warga_id', $ronda->warga_id)->first();

      if (!$userByWarga) {
        continue; // Skip jika user tidak ditemukan
      }

      // Cek apakah pesan untuk user dan hari ini sudah dibuat
      $pesanSudahAda = Pesan::where('user_id', $userByWarga->id)
        ->where('title', 'Tagihan Pembayaran Ronda')
        ->whereDate('created_at', $tglHariIni)
        ->exists();

      if ($pesanSudahAda) {
        continue;
      }
      $hariBelumBayar = Carbon::parse($ronda->tgl_absen_ronda)->diffInDays(Carbon::today());

      $isiPesan = "
        <p>Kepada Yth. Bapak/Ibu <strong>{$ronda->nama_warga}</strong>,</p>
        <p>
          Berdasarkan catatan absensi kegiatan ronda di lingkungan kita, diketahui bahwa pada hari
          <strong>" . Fungsi::format_tgl($ronda->tgl_absen_ronda) . "</strong>, Bapak/Ibu tidak hadir dalam jadwal ronda yang telah ditentukan.
          Sesuai dengan kesepakatan warga mengenai sanksi administratif bagi ketidakhadiran kegiatan ronda,
          maka dikenakan tagihan sebesar <strong>" . Fungsi::rupiah($ronda->nominal_tagihan) . "</strong> sebagai bentuk kontribusi pengganti kehadiran.
        </p>
        <p>
          Sampai saat ini, tagihan tersebut belum dibayarkan, tercatat <strong>{$hariBelumBayar} hari</strong> dari jadwal ketidak hadiran ronda.
        </p>
        <p>
          Pembayaran dapat dilakukan melalui pengurus RT atau saluran pembayaran yang telah ditentukan paling lambat
          sebelum jadwal ronda berikutnya.
        </p>
        <p>
          Mohon kerjasamanya agar kegiatan ronda dapat terus berjalan lancar dan keamanan lingkungan kita tetap terjaga.
        </p>
        <p>
          Atas perhatian dan pengertiannya, kami ucapkan terima kasih.
        </p>
        <p>
          Hormat kami,<br>
          <em>Pengurus Keamanan Lingkungan</em>
        </p>
    ";


      // Simpan pesan ke database
      Pesan::create([
        'user_id' => $userByWarga->id,
        'title' => 'Tagihan Pembayaran Ronda',
        'message' => $isiPesan,
        'created_at' => Carbon::now(),
        'created_by' => $userLogin->username,
        'updated_by' => $userLogin->username,
        'updated_at' => Carbon::now(),
      ]);
    }







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
