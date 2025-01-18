<?php

namespace Modules\Ronda\Models;

use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ronda\Database\Factories\RondaFactory;

class Ronda extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function warga()
  {
    return $this->hasMany(Warga::class);
  }
}
