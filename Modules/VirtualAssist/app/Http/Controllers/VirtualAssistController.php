<?php

namespace Modules\VirtualAssist\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VirtualAssistController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $title = "Virtual Assisten";

    return view(
      'virtualassist::virtual.index',
      [
        'title' => $title,
      ]
    );
  }
  public function getDatabase()
  {
    $data = [
      'data_warga' => $this->loadDataWarga(),
      'data_jadwal_ronda' => $this->loadDataJadwalRonda(),
      'data_absen_ronda' => $this->loadDataAbsenRonda(),
      'data_denda_ronda' => $this->loadDataTagihanRonda(),
      'data_pembayaran_ronda' => $this->loadDataPembayaranRonda(),

      'status' => 'success',
      'message' => 'Data berhasil diambil',
      'timestamp' => now()->toDateTimeString()
    ];

    return response()->json($data);
  }

  public function loadDataWarga()
  {
    return DB::table('wargas as a')
      ->select([
        'a.*',
        DB::raw("CASE a.status_perkawinan
                  WHEN 1 THEN 'Belum Menikah'
                  WHEN 2 THEN 'Menikah'
                  WHEN 3 THEN 'Cerai Hidup'
                  WHEN 4 THEN 'Cerai Mati'
                  ELSE 'Tidak Diketahui'
              END AS status_perkawinan_text"),
        DB::raw("CASE a.status_keluarga
                  WHEN 1 THEN 'Kepala Keluarga'
                  WHEN 2 THEN 'Suami'
                  WHEN 3 THEN 'Istri'
                  WHEN 4 THEN 'Anak'
                  ELSE 'Tidak Diketahui'
              END AS status_keluarga_text"),
        DB::raw("CASE a.agama
                  WHEN 1 THEN 'Islam'
                  WHEN 2 THEN 'Kristen'
                  WHEN 3 THEN 'Hindu'
                  WHEN 4 THEN 'Budha'
                  ELSE 'Tidak Diketahui'
              END AS agama_text"),
        DB::raw("CASE a.pendidikan
                  WHEN 1 THEN 'SD/Sederajat'
                  WHEN 2 THEN 'SMP/Sederajat'
                  WHEN 3 THEN 'SMA/Sederajat'
                  WHEN 4 THEN 'D3/Sederajat'
                  WHEN 5 THEN 'S1/Sederajat'
                  WHEN 6 THEN 'S2/Sederajat'
                  WHEN 7 THEN 'S3/Sederajat'
                  ELSE 'Tidak Diketahui'
              END AS pendidikan_text"),
        DB::raw("CASE a.pekerjaan
                  WHEN 1 THEN 'Pegawai Negeri Sipil (PNS)'
                  WHEN 2 THEN 'Karyawan Swasta'
                  WHEN 3 THEN 'Wiraswasta / Pengusaha'
                  WHEN 4 THEN 'Petani'
                  WHEN 5 THEN 'Nelayan'
                  WHEN 6 THEN 'Buruh / Pekerja Lepas'
                  WHEN 7 THEN 'Guru / Dosen'
                  WHEN 8 THEN 'Dokter / Tenaga Medis'
                  WHEN 9 THEN 'TNI / Polri'
                  WHEN 10 THEN 'Ojek Online / Sopir'
                  WHEN 11 THEN 'Ibu Rumah Tangga'
                  WHEN 12 THEN 'Mahasiswa / Pelajar'
                  WHEN 13 THEN 'Pensiunan'
                  WHEN 14 THEN 'Teknisi / Mekanik'
                  WHEN 15 THEN 'Seniman / Pekerja Kreatif'
                  WHEN 16 THEN 'Programmer / IT Specialist'
                  WHEN 17 THEN 'Pengacara / Notaris'
                  WHEN 18 THEN 'Akuntan / Konsultan Keuangan'
                  WHEN 19 THEN 'Pedagang / Penjual'
                  WHEN 20 THEN 'Lainnya'
                  ELSE 'Tidak Diketahui'
              END AS pekerjaan_text")
      ])
      ->get();
  }

  public function loadDataTagihanRonda()
  {
    return DB::table('ronda_warga as a')
      ->select([
        'b.tanggal_ronda',
        'c.nama',
        'd.nominal_tagihan as nominal_tagihan_ronda'
      ])
      ->join('rondas as b', 'a.ronda_id', '=', 'b.id')
      ->join('wargas as c', 'a.warga_id', '=', 'c.id')
      ->join('tagihan_rondas as d', 'd.ronda_id', '=', 'a.ronda_id')
      ->get();
  }
  public function loadDataJadwalRonda()
  {
    return DB::table('ronda_warga as a')
      ->select([
        'b.tanggal_ronda',
        'c.nama',
      ])
      ->join('rondas as b', 'a.ronda_id', '=', 'b.id')
      ->join('wargas as c', 'a.warga_id', '=', 'c.id')
      ->get();
  }
  public function loadDataAbsenRonda()
  {
    return DB::table('ronda_absens as a')
      ->select('a.*', 'b.tanggal_ronda', 'c.nama')
      ->join('rondas as b', 'a.ronda_id', '=', 'b.id')
      ->join('wargas as c', 'a.warga_id', '=', 'c.id')
      ->where('a.absen', 2)
      ->get();
  }
  public function loadDataPembayaranRonda()
  {
    return DB::table('pembayarans as a')
      ->select('a.*')
      ->get();
  }
}
