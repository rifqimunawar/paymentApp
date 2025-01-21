<?php

namespace Modules\Ronda\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Master\Models\Warga;

// use Modules\Ronda\Database\Factories\RondaAbsenFactory;

class RondaAbsen extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function ronda()
  {
    return $this->belongsTo(Ronda::class, 'ronda_id');
  }

  public function warga()
  {
    return $this->belongsTo(Warga::class, 'warga_id');
  }
}
