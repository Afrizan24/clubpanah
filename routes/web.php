<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');

Route::get('/beranda', [\App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');

Route::get('/strukturorganisasi', [App\Http\Controllers\StrukturOrganisasiComponentController::class, 'index'])->name('struktur.index');

Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/informasidanlayanan', function () {
    return view('informasidanlayanan');
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
});
