<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tagihan\Models\Umum;
// use Modules\Master\Database\Factories\PeriodeFactory;

class Periode extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function tagihanUmum()
  {
    return $this->hasMany(Umum::class, 'periode_id');
  }
}
