<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/strukturorganisasi', function () {
    return view('strukturorganisasi');
});

Route::get('/admin', function () {
    return view('admin.index');  // Menampilkan halaman index.blade.php
});

Route::get('/admin/beranda', function () {
    return view('admin.konten.beranda');  // Menampilkan form di beranda.blade.php
});

