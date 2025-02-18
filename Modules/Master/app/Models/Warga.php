<?php

namespace Modules\Master\Models;

use Modules\Ronda\Models\Ronda;
use Modules\Ronda\Models\RondaAbsen;
use Modules\Tagihan\Models\Pam;
use Modules\Tagihan\Models\Umum;
use Modules\Tagihan\Models\Tagihan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Master\Database\Factories\WargaFactory;

class Warga extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  // Relasi ke Umum melalui tabel pivot "umum_warga"
  public function umums()
  {
    return $this->belongsToMany(Umum::class, 'umum_warga', 'warga_id', 'umum_id')
      ->withTimestamps();
  }



  public function tagihanPam()
  {
    return $this->hasMany(Pam::class, 'warga_id');
  }
  public function rondas()
  {
    return $this->belongsToMany(Ronda::class, 'ronda_warga', 'warga_id', 'ronda_id')
      ->withTimestamps();
  }
  public function absens()
  {
    return $this->hasMany(RondaAbsen::class, 'warga_id');
  }

  // Relasi dengan Tagihan melalui tabel pivot
  public function tagihans()
  {
    return $this->belongsToMany(Umum::class, 'warga_tagihan_periode')
      ->withPivot('periode_id')
      ->withTimestamps();
  }

  // Relasi dengan Periode melalui tabel pivot
  public function periodes()
  {
    return $this->belongsToMany(Periode::class, 'warga_tagihan_periode')
      ->withPivot('umum_id')
      ->withTimestamps();
  }
}
