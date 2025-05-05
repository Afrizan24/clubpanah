<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\BerandaFoto;
use App\Models\Berita;
use App\Models\Event; // ✅ Pastikan baris ini ada
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        $events = Event::latest()->first(); // ✅ Sekarang ini benar
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

        $dbFotos = BerandaFoto::all()->groupBy('section');
        $fotos = $fotos->merge($dbFotos);

        return view('beranda', compact('beranda', 'fotos', 'events'));
    }

}
