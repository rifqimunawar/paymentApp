<?php

namespace Modules\Master\Models;

use Modules\Tagihan\Models\Pam;
use Modules\Tagihan\Models\Umum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Master\Database\Factories\WargaFactory;

class Warga extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
  public function tagihanUmum()
  {
    return $this->hasMany(Umum::class, 'warga_id');
  }
  public function tagihanPam()
  {
    return $this->hasMany(Pam::class, 'warga_id');
  }
}
