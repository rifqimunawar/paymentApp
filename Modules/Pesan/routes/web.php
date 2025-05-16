<?php

use Illuminate\Support\Facades\Route;
use Modules\Pesan\Http\Controllers\PesanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('pesan')->middleware('auth')->group(function () {

  Route::get('/', [PesanController::class, 'index'])->name('pesan.index');
  Route::get('/{id}', [PesanController::class, 'show'])->name('pesan.show');

});
