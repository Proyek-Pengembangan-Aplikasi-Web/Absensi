<?php

use App\Http\Controllers\Guru\AbsensiController;
use App\Http\Controllers\Guru\JadwalController;
use Illuminate\Support\Facades\Route;

Route::prefix('guru')->name('guru.')->middleware(['auth', 'role:guru'])->group(function () {
    Route::resource('jadwal', JadwalController::class);
    Route::resource('absensi', AbsensiController::class);
});
