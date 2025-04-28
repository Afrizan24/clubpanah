<?php

use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\StrukturOrganisasiComponentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\BeritaController as PublicBeritaController;


Route::get('/', [\App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');

Route::get('/beranda', [\App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');

Route::get('/strukturorganisasi', [App\Http\Controllers\StrukturOrganisasiComponentController::class, 'index'])->name('struktur.index');

Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');


Route::get('admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');


Route::get('/berita', function () {
    return view('berita');
});
Route::get('/informasidanlayanan', function () {
    return view('informasidanlayanan');
});
Route::get('/potoboth', function () {
    return view('potoboth');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

    Route::get('/beranda', [App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('admin.beranda.index');
    Route::put('/beranda', [App\Http\Controllers\Admin\BerandaController::class, 'update'])->name('admin.beranda.update');

    Route::get('/struktur', [App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'index'])->name('admin.struktur.index');
    Route::post('/struktur', [App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'store'])->name('admin.struktur.store');
    Route::put('/struktur/{id}', [App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'update'])->name('admin.struktur.update');
    Route::delete('/struktur/{id}', [App\Http\Controllers\Admin\StrukturOrganisasiController::class, 'destroy'])->name('admin.struktur.destroy');

    Route::get('/galeri', [App\Http\Controllers\Admin\GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('/galeri', [App\Http\Controllers\Admin\GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeri/{id}/edit', [App\Http\Controllers\Admin\GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/galeri/{id}', [App\Http\Controllers\Admin\GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [App\Http\Controllers\Admin\GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    Route::get('/berita', [App\Http\Controllers\Admin\BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [App\Http\Controllers\Admin\BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [App\Http\Controllers\Admin\BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{id}/edit', [App\Http\Controllers\Admin\BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [App\Http\Controllers\Admin\BeritaController::class, 'update'])->name('admin.berita.update');

        
});
