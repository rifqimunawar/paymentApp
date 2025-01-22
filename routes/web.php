<?php

use App\Helpers\GetSettings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

// Route::get('/', function () {
//   return redirect('dashboard');
// });
Route::get('/api/ronda-jadwal', function () {
  return response()->json(json_decode(GetSettings::getRondaJadwal()), 200);
});
