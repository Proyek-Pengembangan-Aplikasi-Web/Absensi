<?php
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PelajaranController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('siswa', SiswaController::class)->except('show');
    Route::resource('absensi', AbsensiController::class);
    Route::resource('kelas', KelasController::class)->except('show');
    Route::resource('pelajaran', PelajaranController::class)->except('show');
    Route::resource('jadwal', JadwalController::class);
    Route::resource('users', UserController::class);
});
