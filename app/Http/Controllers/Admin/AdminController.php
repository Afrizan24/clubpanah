<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\StrukturOrganisasi;
use App\Models\BerandaFoto;
use App\Models\Galeri;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data beranda dan struktur organisasi
        $beranda = Beranda::first();
        $struktur = StrukturOrganisasi::all();
        $galeris = Galeri::all();
        $editGaleri = null;
        $editStruktur = null;

        if ($request->has('edit')) {
            $editGaleri = Galeri::findOrFail($request->edit);
        }
        // Cek apakah ada parameter edit di request
        if ($request->has('edit')) {
            $editStruktur = StrukturOrganisasi::findOrFail($request->edit);
        }

        // Ambil foto dari database
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

        // Kembalikan view dengan data yang diperlukan
        return view('admin.index', compact('beranda', 'fotos', 'struktur', 'editStruktur', 'galeris', 'editGaleri'));
    }
}
