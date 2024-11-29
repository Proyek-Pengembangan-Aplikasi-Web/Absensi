<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('siswa.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('siswa', SiswaController::class)->except('show');
    Route::resource('absensi', AbsensiController::class);
    Route::resource('kelas', KelasController::class)->except('show');
    Route::resource('pelajaran', PelajaranController::class)->except('show');
    Route::resource('users', UserController::class);
});

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
