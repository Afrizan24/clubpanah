<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\InformasiLayanan;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    // Dalam InformasiController.php
    public function index()
    {
        // Ambil semua data layanan dari model InformasiLayanan
        $layanan = InformasiLayanan::all();
        $testimonials = Testimonial::all();

        // Kirimkan data layanan ke view yang sesuai
        return view('informasidanlayanan', compact('layanan','testimonials'));
    }
}
