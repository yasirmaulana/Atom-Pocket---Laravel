<?php

use App\Http\Controllers\DompetController;
use App\Http\Controllers\DompetKeluarController;
use App\Http\Controllers\DompetMasukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dompet', [DompetController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/dompetmasuk', [DompetMasukController::class, 'index']);

Route::get('/dompetkeluar', [DompetKeluarController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);
