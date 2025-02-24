<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Mobile\Http\Controllers\MobileController;

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

Route::prefix('mobile')->group(function () {
  Route::get('/login', [AuthController::class, 'login'])->name('mobile.login');
  Route::post('/login', [AuthController::class, 'authenticate'])->name('mobile.authenticate');
  Route::get('/logout', [AuthController::class, 'mobileLogout'])->name('mobile.logout');
});

Route::prefix('mobile')->middleware('auth')->group(function () {
  Route::get('/home', [MobileController::class, 'home'])->name('mobile.home');
  Route::get('/tagihan', [MobileController::class, 'tagihan'])->name('mobile.tagihan');
  Route::get('/ronda', [MobileController::class, 'ronda'])->name('mobile.ronda');
  Route::get('/history', [MobileController::class, 'history'])->name('mobile.history');
  Route::get('/settings', [MobileController::class, 'settings'])->name('mobile.settings');
});
