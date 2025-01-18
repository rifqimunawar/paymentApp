<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Master\Database\Factories\WargaFactory;

class Warga extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
}
