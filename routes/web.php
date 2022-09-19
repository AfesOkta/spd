<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\PaguController;
use App\Http\Controllers\SpdController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\KwitansiLnController;
use App\Http\Controllers\KwrilController;
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

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/personel', [PersonelController::class, 'personel'])->name('personel');
Route::get('/master', [MasterController::class, 'index'])->name('master');

// pangkat
Route::post('/add_pangkat', [MasterController::class, 'add_pangkat'])->name('add-pangkat');
Route::post('/edit_pangkat', [MasterController::class, 'edit_pangkat'])->name('edit-pangkat');
Route::get('/delete_pangkat', [MasterController::class, 'delete_pangkat'])->name('delete-pangkat');

// Golongan
Route::post('/add_golongan', [MasterController::class, 'add_golongan'])->name('add-golongan');
Route::post('/edit_golongan', [MasterController::class, 'edit_golongan'])->name('edit-golongan');
Route::get('/delete_golongan', [MasterController::class, 'delete_golongan'])->name('delete-golongan');

// Satker
Route::post('/add_satker', [MasterController::class, 'add_satker'])->name('add-satker');
Route::post('/edit_satker', [MasterController::class, 'edit_satker'])->name('edit-satker');
Route::get('/delete_satker', [MasterController::class, 'delete_satker'])->name('delete-satker');

// Status
Route::post('/add_status', [MasterController::class, 'add_status'])->name('add-status');
Route::post('/edit_status', [MasterController::class, 'edit_status'])->name('edit-status');
Route::get('/delete_status', [MasterController::class, 'delete_status'])->name('delete-status');

// Tujuan
Route::post('/add_tujuan', [MasterController::class, 'add_tujuan'])->name('add-tujuan');
Route::post('/edit_tujuan', [MasterController::class, 'edit_tujuan'])->name('edit-tujuan');
Route::get('/delete_tujuan', [MasterController::class, 'delete_tujuan'])->name('delete-tujuan');

// Pembayaran
Route::post('/add_pembayaran', [MasterController::class, 'add_pembayaran'])->name('add-pembayaran');
Route::post('/edit_pembayaran', [MasterController::class, 'edit_pembayaran'])->name('edit-pembayaran');
Route::get('/delete_pembayaran', [MasterController::class, 'delete_pembayaran'])->name('delete-pembayaran');

// Personel
Route::get('/get_personel_data', [PersonelController::class, 'get_personel_data'])->name('get-personel-data');
Route::post('/add_personel', [PersonelController::class, 'add_personel'])->name('add-personel');
Route::post('/edit_personel', [PersonelController::class, 'edit_personel'])->name('edit-personel');
Route::get('/delete_personel/{nrp}', [PersonelController::class, 'delete_personel'])->name('delete-personel');
Route::get('/personel_import', [PersonelController::class, 'import'])->name('import-personel');
Route::post('/do_personel_import', [PersonelController::class, 'do_import'])->name('do-import-personel');

// Pejabat
Route::get('/pejabat', [PejabatController::class, 'index'])->name('pejabat');
Route::get('/get_pejabat', [PejabatController::class, 'get_pejabat_data'])->name('get-pejabat-data');
Route::post('/add_pejabat', [PejabatController::class, 'add_pejabat'])->name('add-pejabat');
Route::get('/delete_pejabat/{id}', [PejabatController::class, 'delete_pejabat'])->name('delete-pejabat');

// Pagu
Route::get('/pagu', [PaguController::class, 'index'])->name('pagu');
Route::get('/get_pagu', [PaguController::class, 'get_pagu_data'])->name('get-pagu-data');
Route::get('/get_pagu_by_id', [PaguController::class, 'get_pagu_data_by_id'])->name('get-pagu-data-by-id');
Route::post('/add_pagu', [PaguController::class, 'add_pagu'])->name('add-pagu');
Route::get('/delete_pagu/{id}', [PaguController::class, 'delete_pagu'])->name('delete-pagu');

// SPD
Route::get('/spd', [SpdController::class, 'index'])->name('spd');
Route::get('/get_spd', [SpdController::class, 'get_spd_data'])->name('get-spd-data');
Route::get('/get_spd_by_id', [SpdController::class, 'get_spd_by_id'])->name('get-spd-by-id');
Route::post('/add_spd', [SpdController::class, 'add_spd'])->name('add-spd');
Route::get('/delete_spd/{id}', [SpdController::class, 'delete_spd'])->name('delete-spd');

// Kwitansi
Route::get('/kwitansi', [KwitansiController::class, 'index'])->name('kwitansi');
Route::get('/get_kwitansi', [KwitansiController::class, 'get_kwitansi_data'])->name('get-kwitansi-data');
Route::post('/add_kwitansi', [KwitansiController::class, 'add_kwitansi'])->name('add-kwitansi');
Route::get('/delete_kwitansi/{id}', [KwitansiController::class, 'delete_kwitansi'])->name('delete-kwitansi');

// Kwitansi LN
Route::get('/kwitansi_ln', [KwitansiLnController::class, 'index'])->name('kwitansi_ln');
Route::get('/get_kwitansi_ln', [KwitansiLnController::class, 'get_kwitansi_ln_data'])->name('get-kwitansi_ln-data');
Route::post('/add_kwitansi_ln', [KwitansiLnController::class, 'add_kwitansi_ln'])->name('add-kwitansi_ln');
Route::get('/delete_kwitansi_ln/{id}', [KwitansiLnController::class, 'delete_kwitansi_ln'])->name('delete-kwitansi_ln');


// Kwitansi Rill
Route::get('/get_kwitansi_rill', [KwrilController::class, 'get_kwitansi_data'])->name('get-kwitansi-data-rill');
Route::post('/add_kwitansi_rill', [KwrilController::class, 'add_kwitansi'])->name('add-kwitansi-rill');
Route::get('/delete_kwitansi_rill/{id}', [KwrilController::class, 'delete_kwitansi'])->name('delete-kwitansi-rill');

