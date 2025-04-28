<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\BerandaFoto;
use App\Models\Berita;
use App\Models\Galeri;
<<<<<<< HEAD
use App\Models\InformasiLayanan;
=======
use App\Models\StrukturOrganisasi;
>>>>>>> fbd738b5886728c280871d2e7a7e5ca140f82e50
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data beranda (halaman utama) dan struktur organisasi
        $beranda = Beranda::first(); // Mengambil data beranda pertama
        $struktur = StrukturOrganisasi::all(); // Mengambil semua data struktur organisasi
        $galeris = Galeri::all(); // Mengambil semua data galeri
        $editGaleri = null; // Variabel untuk galeri yang sedang diedit
        $editStruktur = null; // Variabel untuk struktur yang sedang diedit
        $beritas = Berita::latest()->first(); // Mengambil berita terbaru

<<<<<<< HEAD
        $layanan = InformasiLayanan::all();

=======
        // Cek apakah ada parameter 'edit' di request untuk mengedit galeri
>>>>>>> fbd738b5886728c280871d2e7a7e5ca140f82e50
        if ($request->has('edit')) {
            $editGaleri = Galeri::findOrFail($request->edit); // Ambil galeri berdasarkan ID
        }

        // Cek apakah ada parameter 'edit' di request untuk mengedit struktur organisasi
        if ($request->has('edit')) {
            $editStruktur = StrukturOrganisasi::findOrFail($request->edit); // Ambil struktur berdasarkan ID
        }

        // Ambil foto-foto yang terkait dengan berbagai section
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

        // Ambil foto dari database dan kelompokkan berdasarkan section
        $dbFotos = BerandaFoto::all()->groupBy('section');
        
        // Gabungkan foto yang sudah dikelompokkan ke dalam koleksi $fotos
        $fotos = $fotos->merge($dbFotos);

<<<<<<< HEAD
        // Kembalikan view dengan data yang diperlukan
        return view('admin.index', compact('beranda', 'fotos', 'struktur', 'editStruktur', 'galeris', 'editGaleri', 'layanan'));
=======
        // Kembalikan view admin dengan data yang sudah diproses
        return view('admin.index', compact('beranda', 'fotos', 'struktur', 'editStruktur', 'galeris', 'editGaleri', 'beritas'));
>>>>>>> fbd738b5886728c280871d2e7a7e5ca140f82e50
    }
}
