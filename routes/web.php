<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PejabatController;
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

// Personel
Route::get('/get_personel_data', [PersonelController::class, 'get_personel_data'])->name('get-personel-data');
Route::post('/add_personel', [PersonelController::class, 'add_personel'])->name('add-personel');
Route::post('/edit_personel', [PersonelController::class, 'edit_personel'])->name('edit-personel');
Route::get('/delete_personel/{nrp}', [PersonelController::class, 'delete_personel'])->name('delete-personel');

// Pejabat
Route::get('/pejabat', [PejabatController::class, 'index'])->name('pejabat');
Route::get('/get_pejabat', [PejabatController::class, 'get_pejabat_data'])->name('get-pejabat-data');
Route::post('/add_pejabat', [PejabatController::class, 'add_pejabat'])->name('add-pejabat');
Route::get('/delete_pejabat/{id}', [PejabatController::class, 'delete_pejabat'])->name('delete-pejabat');
