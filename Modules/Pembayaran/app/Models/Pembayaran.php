<?php

namespace Modules\Pembayaran\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pembayaran\Database\Factories\PembayaranFactory;

class pembayaran extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PembayaranFactory
    // {
    //     // return PembayaranFactory::new();
    // }
}
