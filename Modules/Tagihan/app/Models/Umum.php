<?php

namespace Modules\Tagihan\Models;

use Modules\Master\Models\Warga;
use Modules\Master\Models\Periode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tagihan\Database\Factories\UmumFactory;

class Umum extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];


  // Relasi ke Warga melalui tabel pivot "umum_warga"
  public function wargas()
  {
    return $this->belongsToMany(Warga::class, 'umum_warga', 'umum_id', 'warga_id')
      ->withTimestamps();
  }
  public function umums()
  {
    return $this->belongsToMany(Umum::class, 'umum_warga', 'warga_id', 'umum_id')
      ->withTimestamps();
  }
  public function periodes()
  {
    return $this->belongsToMany(Periode::class, 'periode_umum', 'umum_id', 'periode_id')
      ->withTimestamps();
  }

  public static function dataTagihanWarga($tagihan_id)
  {
    if (isset($tagihan_id)) {
      return self::select('umum_warga.*', 'umums.nama_tagihan', 'umums.nominal', 'wargas.nama')
        ->join('umums', 'umum_warga.umum_id', '=', 'umums.id')
        ->join('wargas', 'umum_warga.warga_id', '=', 'wargas.id')
        ->where('umums.id', $tagihan_id) // Kondisi sesuai query SQL
        ->orderBy('umum_warga.id', 'desc')
        ->get(); // Mengembalikan semua data
    }

    return false;
  }


}
