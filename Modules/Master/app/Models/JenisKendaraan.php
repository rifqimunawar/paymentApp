<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Master\Database\Factories\JenisKendaraanFactory;

class Jenis_Kendaraan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): JenisKendaraanFactory
    // {
    //     // return JenisKendaraanFactory::new();
    // }
}