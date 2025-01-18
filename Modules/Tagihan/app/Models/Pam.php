<?php

namespace Modules\Tagihan\Models;

use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tagihan\Database\Factories\PamFactory;

class Pam extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function warga()
  {
    return $this->belongsTo(Warga::class, 'warga_id');
  }

}
