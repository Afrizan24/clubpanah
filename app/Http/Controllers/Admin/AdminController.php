<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\BerandaFoto;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\InformasiLayanan;
use App\Models\Pesan;
use App\Models\StatistikLatihan;
use App\Models\StrukturOrganisasi;
use App\Models\Testimonial;
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
        $statistikLatihan = StatistikLatihan::all();
        $pesans = Pesan::latest()->paginate(5);
        // Konversi data ke format yang diinginkan
        $skillData = StatistikLatihan::all()->map(function ($stat) {
            return [
                'accuracy'   => min(100, $stat->on_target * 2),
                'power'      => min(100, $stat->push_up * 2),
                'focus'      => min(100, $stat->latihan_konsentrasi * 2),
                'technique'  => min(100, $stat->off_target > 0 ? 100 - $stat->off_target * 5 : 90),
                'strength'   => min(100, $stat->push_up * 2),
                'endurance'  => min(100, $stat->tahan_nafas * 2),
                'stamina'    => min(100, $stat->waktu_latihan * 2),
            ];
        })->first();

        $layanan = InformasiLayanan::all();
        $testimonials = Testimonial::all();

        // Cek apakah ada parameter 'edit' di request untuk mengedit galeri
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

        // Kembalikan view dengan data yang diperlukan
        return view('admin.index', compact('pesans','skillData', 'beranda', 'fotos', 'struktur', 'editStruktur', 'galeris', 'editGaleri', 'layanan', 'testimonials', 'beritas', 'layanan'));
    }
}
