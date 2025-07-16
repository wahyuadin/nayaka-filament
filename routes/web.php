<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');
Route::prefix('layanan')->group(function () {
    Route::get('klinik', [LayananController::class, 'klinik'])->name('layanan.klinik');
    Route::get('provider', [LayananController::class, 'provider'])->name('layanan.provider');
    Route::get('inhouse', [LayananController::class, 'inhouse'])->name('layanan.inhouse');
    Route::get('download', [LayananController::class, 'download'])->name('layanan.download');
});
Route::get('management', [Controller::class, 'management'])->name('management.index');
Route::get('carrier', [Controller::class, 'carrier'])->name('carrier.index');
