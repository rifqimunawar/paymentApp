<?php

namespace Modules\Tagihan\Models;

use Modules\Master\Models\Warga;
use Modules\Master\Models\Periode;
use Illuminate\Database\Eloquent\Model;
use Modules\Pembayaran\Models\Pembayaran;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tagihan\Database\Factories\UmumFactory;

class Umum extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
  // Relasi ke Warga melalui tabel pivot "umum_warga"
  // public function wargas()
  // {
  //   return $this->belongsToMany(Warga::class, 'umum_warga', 'umum_id', 'warga_id')
  //     ->withTimestamps();
  // }
  public function umums()
  {
    return $this->belongsToMany(Umum::class, 'umum_warga', 'warga_id', 'umum_id')
      ->withTimestamps();
  }
  // public function periodes()
  // {
  //   return $this->belongsToMany(Periode::class, 'periode_umum', 'umum_id', 'periode_id')
  //     ->withTimestamps();
  // }

  // Relasi dengan Warga melalui tabel pivot
  public function wargas()
  {
    return $this->belongsToMany(Warga::class, 'warga_tagihan_periode')
      ->withPivot('periode_id')
      ->withTimestamps();
  }

  // Relasi dengan Periode melalui tabel pivot
  public function periodes()
  {
    return $this->belongsToMany(Periode::class, 'warga_tagihan_periode')
      ->withPivot('warga_id')
      ->withTimestamps();
  }

  public function pembayaran()
  {
    return $this->hasMany(Pembayaran::class, 'tagihan_id', 'id');
  }

}
