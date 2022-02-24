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
Route::get('/dompet/create', [DompetController::class, 'create']);
Route::post('/dompet', [DompetController::class, 'store']);
Route::get('/dompet/{id}', [DompetController::class, 'show']);
Route::get('/dompet/{id}/edit', [DompetController::class, 'edit']);
Route::patch('/dompet/{id}', [DompetController::class, 'update']);
Route::patch('/dompet/{id}/{kode}', [DompetController::class, 'setstatus']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::patch('/kategori/{id}', [KategoriController::class, 'update']);
Route::patch('/kategori/{id}/{kode}', [KategoriController::class, 'setstatus']);

Route::get('/dompetmasuk', [DompetMasukController::class, 'index']);
Route::get('/dompetmasuk/create', [DompetMasukController::class, 'create']);
Route::post('/dompetmasuk', [DompetMasukController::class, 'store']);

Route::get('/dompetkeluar', [DompetKeluarController::class, 'index']);
Route::get('/dompetkeluar/create', [DompetKeluarController::class, 'create']);
Route::post('/dompetkeluar', [DompetKeluarController::class, 'store']);

Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('/laporan', [LaporanController::class, 'laporan']);
