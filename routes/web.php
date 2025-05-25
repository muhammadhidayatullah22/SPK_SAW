<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HasilController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kriteria', KriteriaController::class)->parameters([
    'kriteria' => 'kriteria'
]);

Route::resource('siswa', SiswaController::class);

Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{siswa}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
Route::post('/penilaian/{siswa}', [PenilaianController::class, 'update'])->name('penilaian.update');

Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
