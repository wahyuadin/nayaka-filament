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
    Route::prefix('download')->group(function () {
        Route::get('/', [LayananController::class, 'download'])->name('layanan.download');
        Route::get('{id}', [LayananController::class, 'trackingDownload'])->name('formulir.download');
    });
    Route::get('download', [LayananController::class, 'download'])->name('layanan.download');
});
Route::prefix('carrier')->group(function () {
    Route::get('/', [Controller::class, 'carrier'])->name('carrier.index');
    Route::get('filter', [Controller::class, 'filter'])->name('carrier.filter');
});
Route::get('management', [Controller::class, 'management'])->name('management.index');
