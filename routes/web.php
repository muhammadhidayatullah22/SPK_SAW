<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::resource('kriteria', KriteriaController::class)->parameters([
    'kriteria' => 'kriteria'
]);

Route::resource('siswa', SiswaController::class);

Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{siswa}/edit-modal', [PenilaianController::class, 'editModal'])->name('penilaian.editModal');
Route::post('/penilaian/{siswa}', [PenilaianController::class, 'update'])->name('penilaian.update');

Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');

Route::resource('user', UserController::class);

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/resetPassword', [ProfileController::class, 'resetPassword'])->name('profile.resetPassword');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

