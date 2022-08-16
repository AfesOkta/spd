<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\MasterController;
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

