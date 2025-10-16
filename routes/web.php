<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');

Route::prefix('layanan')->group(function () {
    Route::get('klinik', [LayananController::class, 'klinik'])->name('layanan.klinik');
    Route::get('provider', [LayananController::class, 'provider'])->name('layanan.provider');
    Route::prefix('serversite')->group(function () {
        Route::get('provider', [LayananController::class, 'serversiteProvider'])->name('layanan.serversite');
        Route::get('klinik', [LayananController::class, 'serversiteKlinik'])->name('klinik.serversite');
        Route::get('inhouse', [LayananController::class, 'serversiteInhouse'])->name('inhouse.serversite');
    });
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
Route::prefix('kegiatan')->group(function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::post('/', [KegiatanController::class, 'carikegiatanPost'])->name('cari.kegiatan');
    Route::get('content/{slug}', [KegiatanController::class, 'slug'])->name('kegiatan.slug');
    Route::get('kategori/{slug}', [KegiatanController::class, 'kategori'])->name('kegiatan.kategori.slug');
    Route::get('tag/{slug}', [KegiatanController::class, 'showTag'])->name('kegiatan.tag.slug');
});
Route::prefix('video')->group(function () {
    Route::get('/', [VideoController::class, 'index'])->name('video.index');
    Route::post('/', [VideoController::class, 'carivideoPost'])->name('cari.video');
    Route::get('{slug}', [VideoController::class, 'slug'])->name('video.slug');
    Route::get('kategori/{slug}', [VideoController::class, 'kategori'])->name('video.kategori.slug');
    Route::get('tag/{slug}', [VideoController::class, 'tag'])->name('video.tag.slug');
});
Route::get('management', [Controller::class, 'management'])->name('management.index');
Route::get('kontak', [Controller::class, 'kontak'])->name('kontak.index');
Route::get('faq', [Controller::class, 'faq'])->name('faq.index');
Route::get('client', [Controller::class, 'client'])->name('client.index');
