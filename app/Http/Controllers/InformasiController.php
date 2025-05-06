<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiLayanan;
use App\Models\Testimonial;
use App\Models\Profile;

class InformasiController extends Controller
{
    public function index()
    {
        // Ambil data layanan, testimonial, dan profil
        $layanan = InformasiLayanan::all();
        $testimonials = Testimonial::all();
        $profiles = Profile::first(); // Ambil data pertama dari tabel profiles

        // Kirimkan data ke view
        return view('informasidanlayanan', compact('layanan', 'testimonials', 'profiles'));
    }
}

