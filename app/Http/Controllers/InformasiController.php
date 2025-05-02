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


// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\InformasiLayanan;
// use App\Models\Testimonial;
// use Illuminate\Support\Facades\Storage;

// class InformasiController extends Controller
// {
//     /**
//      * Menampilkan halaman informasi dan layanan
//      */
//     public function index()
//     {
//         // Ambil data layanan utama (hanya 1 data terbaru)
//         $layanan = InformasiLayanan::latest()->first();
        
//         // Ambil 3 testimonial terbaru
//         $testimonials = Testimonial::latest()->take(3)->get();

//         return view('informasi-layanan.index', compact('layanan', 'testimonials'));
//     }

//     /**
//      * Menampilkan form tambah informasi
//      */
//     public function create()
//     {
//         return view('informasi-layanan.create');
//     }

//     /**
//      * Menyimpan data informasi baru
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'judul' => 'required|string|max:255',
//             'deskripsi' => 'required|string',
//             'hari_jam' => 'required|string',
//             'biaya' => 'nullable|numeric',
//             'lokasi' => 'required|string',
//             'kontak' => 'required|string|max:20',
//             'gambar' => 'nullable|image|max:2048',
//         ]);

//         // Upload gambar jika ada
//         if ($request->hasFile('gambar')) {
//             $validated['gambar'] = $request->file('gambar')->store('informasi-layanan', 'public');
//         }

//         InformasiLayanan::create($validated);

//         return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
//     }

//     /**
//      * Menampilkan form edit informasi
//      */
//     public function edit(InformasiLayanan $informasi)
//     {
//         return view('informasi-layanan.edit', compact('informasi'));
//     }

//     /**
//      * Mengupdate data informasi
//      */
//     public function update(Request $request, InformasiLayanan $informasi)
//     {
//         $validated = $request->validate([
//             'judul' => 'required|string|max:255',
//             'deskripsi' => 'required|string',
//             'hari_jam' => 'required|string',
//             'biaya' => 'nullable|numeric',
//             'lokasi' => 'required|string',
//             'kontak' => 'required|string|max:20',
//             'gambar' => 'nullable|image|max:2048',
//         ]);

//         // Hapus gambar lama jika ada gambar baru
//         if ($request->hasFile('gambar') {
//             if ($informasi->gambar) {
//                 Storage::disk('public')->delete($informasi->gambar);
//             }
//             $validated['gambar'] = $request->file('gambar')->store('informasi-layanan', 'public');
//         }

//         $informasi->update($validated);

//         return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui!');
//     }
// }