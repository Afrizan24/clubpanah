<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beranda;
use App\Models\BerandaFoto;


class BerandaController extends Controller
{
    public function index()
    {
        // Ambil data dari model Beranda dan BerandaFoto
        $beranda = Beranda::first();

        // Initialize koleksi kosong untuk setiap section
        $fotos = collect([
            'hero1' => collect(),
            'hero2' => collect(),
            'galeri1' => collect(),
            'galeri2' => collect(),
            'galeri3' => collect(),
            'galeri4' => collect(),
            'about1' => collect(),
            'about2' => collect(),
            'about3' => collect(),
        ]);

        // Gabungkan dengan foto dari database
        $dbFotos = BerandaFoto::all()->groupBy('section');
        $fotos = $fotos->merge($dbFotos);

        // Kembalikan view dan kirim data
        return view('beranda', compact('beranda', 'fotos'));
    }
}
