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

  public function periode()
  {
    return $this->belongsTo(Periode::class, 'periode_id');
  }
  public function warga()
  {
    return $this->belongsTo(Warga::class, 'warga_id');
  }
}
