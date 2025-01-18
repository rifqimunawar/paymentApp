<?php

use Illuminate\Support\Facades\Route;
use Modules\Ronda\Http\Controllers\RondaController;

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

Route::prefix('ronda')->middleware('auth')->group(function () {

  Route::get('/r', [RondaController::class, 'index'])->name('ronda.index');
  Route::get('/r/create', [RondaController::class, 'create'])->name('ronda.create');
  Route::get('/r/export', [RondaController::class, 'export'])->name('ronda.export');
  Route::get('/r/pdf', [RondaController::class, 'pdf'])->name('ronda.pdf');
  Route::get('/r/print', [RondaController::class, 'print'])->name('ronda.print');
  Route::get('/r/{id}', [RondaController::class, 'edit'])->name('ronda.edit');
  Route::get('/r/{id}/view', [RondaController::class, 'view'])->name('ronda.view');
  Route::post('/r/store', [RondaController::class, 'store'])->name('ronda.store');
  Route::delete('/r/{id}/del', [RondaController::class, 'destroy'])->name('ronda.destroy');

});
