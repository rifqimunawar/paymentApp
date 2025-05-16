<?php

namespace Modules\Pesan\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Pesan\Database\Factories\PesanFactory;

class Pesan extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function warga()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
