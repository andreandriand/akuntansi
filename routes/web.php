<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\LoginController;

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
    return view('index');
})->middleware('auth');


Route::get('/login', function () {
    return view('login.index');
})->middleware('guest')->name('login');

Route::get('/get-data/{uraian_kegiatan}', [RealisasiController::class, 'getData'])->name('get-data');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Route::resource('/anggaran', AnggaranController::class)->middleware('auth');
Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran.index')->middleware('auth');
Route::get('/anggaran/create', [AnggaranController::class, 'create'])->name('anggaran.create')->middleware('admin');
Route::post('/anggaran', [AnggaranController::class, 'store'])->name('anggaran.store')->middleware('admin');
Route::get('/anggaran/{anggaran}/edit', [AnggaranController::class, 'edit'])->name('anggaran.edit')->middleware('admin');
Route::put('/anggaran/{anggaran}', [AnggaranController::class, 'update'])->name('anggaran.update')->middleware('admin');
Route::delete('/anggaran/{anggaran}', [AnggaranController::class, 'destroy'])->name('anggaran.destroy')->middleware('admin');

Route::get('anggaran-export', [AnggaranController::class, 'export'])->name('anggaran.export')->middleware('auth');

Route::resource('/realisasi', RealisasiController::class)->middleware('auth');
Route::get('realisasi-export', [RealisasiController::class, 'export'])->name('realisasi.export')->middleware('auth');

Route::resource('file', FileController::class)->middleware('auth');

Route::get('/file/create/template', [FileController::class, 'downloadTemplate'])->name('file.template')->middleware('auth');

Route::post('/file/download', [FileController::class, 'download'])->name('file.download')->middleware('auth');
