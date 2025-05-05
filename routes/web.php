<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\PemanahController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController as PublicBeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\StrukturOrganisasiComponentController;
use Illuminate\Support\Facades\Route;


// ===========================
// Public Routes
// ===========================

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');

Route::get('/strukturorganisasi', [App\Http\Controllers\StrukturOrganisasiController::class, 'index'])->name('struktur.index');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');

Route::get('/informasidanlayanan', [App\Http\Controllers\InformasiController::class, 'index'])->name('informasidanlayanan');

// Route::get('/admin/pemanah/detail', [PemanahController::class, 'detail'])->name('admin.pemanah.detail');


Route::get('/potoboth', function () {
    return view('potoboth');
})->name('potoboth');


// ===========================
// Admin Routes
// ===========================

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

    Route::get('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('beranda.index');
    Route::put('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'update'])->name('beranda.update');

    Route::get('/struktur', [StrukturOrganisasiController::class, 'index'])->name('struktur.index');
    Route::get('/struktur/{id}', [StrukturOrganisasiController::class, 'show'])->name('struktur.show');
    Route::post('/struktur', [StrukturOrganisasiController::class, 'store'])->name('struktur.store');
    Route::put('/struktur/{id}', [StrukturOrganisasiController::class, 'update'])->name('struktur.update');
    Route::delete('/struktur/{id}', [StrukturOrganisasiController::class, 'destroy'])->name('struktur.destroy');

    Route::get('/galeri', [\App\Http\Controllers\Admin\GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [\App\Http\Controllers\Admin\GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}/edit', [\App\Http\Controllers\Admin\GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [\App\Http\Controllers\Admin\GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [\App\Http\Controllers\Admin\GaleriController::class, 'destroy'])->name('galeri.destroy');

     // --- Berita ---
     Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita.index');
     Route::get('/berita/create', [AdminBeritaController::class, 'create'])->name('berita.create');
     Route::post('/berita', [AdminBeritaController::class, 'storeBerita'])->name('berita.store'); // ganti store → storeBerita
     Route::get('/berita/{id}/edit', [AdminBeritaController::class, 'edit'])->name('berita.edit');
     Route::put('/berita/{id}', [AdminBeritaController::class, 'update'])->name('berita.update');
     // --- Event ---
     Route::post('/event/store', [AdminBeritaController::class, 'storeEvent'])->name('event.store'); // route event
 
     
     Route::get('/layanan', [App\Http\Controllers\Admin\InformasiController::class, 'index'])->name('layanan.index');
     Route::post('/layanan', [App\Http\Controllers\Admin\InformasiController::class, 'store'])->name('layanan.store');
     Route::delete('/testimonial/{testimonial}', [App\Http\Controllers\Admin\InformasiController::class, 'deleteTestimonial'])->name('layanan.deleteTestimonial');
 
    Route::get('/detailpemanah', [App\Http\Controllers\Admin\AdminController::class, 'index']);

    Route::get('/statistik/{id}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'show'])->name('statistik.show');
    Route::post('/statistik/{strukturId}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'store'])->name('statistik.store');
    Route::put('/statistik/{id}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'update'])->name('statistik.update');
    Route::put('/statistik-latihan/{id}', [App\Http\Controllers\Admin\StatistikLatihanController::class, 'update'])
        ->name('statistik-latihan.update');
});