<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AktualController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForecastingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('home');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::resource('/obat', ObatController::class)->middleware('auth')->parameters([
    'obat' => 'obat:kd_obat',
]);

Route::resource('/user', UserController::class)->middleware('auth');

Route::resource('obat.aktual', AktualController::class)->middleware('auth');
Route::resource('obat.forecasting', ForecastingController::class)->middleware('auth');
Route::get('/forecasting', [ForecastingController::class, 'index'])->middleware('auth');
Route::get('/forecasting/cetak', [ForecastingController::class, 'cetak'])->middleware('auth');
