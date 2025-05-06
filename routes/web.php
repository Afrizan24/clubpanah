<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\PemanahController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController as PublicBeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\StrukturOrganisasiComponentController;
use Illuminate\Support\Facades\Route;



// ===========================
// Public Routes
// ===========================

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');

Route::get('/strukturorganisasi', [App\Http\Controllers\StrukturOrganisasiController::class, 'index'])->name('struktur.index');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');

Route::get('/informasidanlayanan', [App\Http\Controllers\InformasiController::class, 'index'])->name('informasidanlayanan');


// ===========================
// Admin Routes
// ===========================

Route::prefix('admin')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

    Route::get('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('admin.beranda.index');
    Route::put('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'update'])->name('admin.beranda.update');

    Route::get('/struktur', [\App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'index'])->name('admin.struktur.index');
    Route::post('/struktur', [\App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'store'])->name('admin.struktur.store');
    Route::put('/struktur/{id}', [\App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'update'])->name('admin.struktur.update');
    Route::delete('/struktur/{id}', [\App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'destroy'])->name('admin.struktur.destroy');

    Route::get('/galeri', [\App\Http\Controllers\Admin\GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('/galeri', [\App\Http\Controllers\Admin\GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeri/{id}/edit', [\App\Http\Controllers\Admin\GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/galeri/{id}', [\App\Http\Controllers\Admin\GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [\App\Http\Controllers\Admin\GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [AdminBeritaController::class, 'storeBerita'])->name('admin.berita.store');
    Route::get('/berita/{id}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');

    Route::post('/event/store', [AdminBeritaController::class, 'storeEvent'])->name('admin.event.store');

    Route::get('/layanan', [App\Http\Controllers\Admin\InformasiController::class, 'index'])->name('admin.layanan.index');
    Route::post('/layanan', [App\Http\Controllers\Admin\InformasiController::class, 'store'])->name('admin.layanan.store');
    Route::delete('/testimonial/{testimonial}', [App\Http\Controllers\Admin\InformasiController::class, 'deleteTestimonial'])->name('admin.layanan.deleteTestimonial');

    Route::get('/detailpemanah', [App\Http\Controllers\Admin\AdminController::class, 'index']);

    Route::get('/statistik/{id}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'show'])->name('statistik.show');
    Route::post('/statistik/{strukturId}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'store'])->name('statistik.store');
    Route::put('/statistik/{id}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'update'])->name('statistik.update');
    Route::put('/statistik-latihan/{id}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'update'])->name('statistik-latihan.update');
});
