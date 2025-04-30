<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiLayanan;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        // Ambil semua layanan dan testimonial
        $layanan = InformasiLayanan::all();
        $testimonials = Testimonial::all();

        // Kirim kedua variabel ke view
        return view('admin.layanan.index', compact('layanan', 'testimonials'));
    }

    public function store(Request $request)
    {
        // Validasi data layanan
        $validatedLayanan = $request->validate([
            'judul'             => 'required|string|max:255',
            'deskripsi'         => 'required|string',
            'hari_jam'          => 'required|string',
            'biaya'             => 'nullable|numeric',
            'lokasi'            => 'required|string|max:255',
            'kontak'            => 'required|string|max:20',
        ]);

        // Validasi data testimonial
        $validatedTestimonial = $request->validate([
            'nama'               => 'nullable|string|max:255',
            'jabatan'            => 'nullable|string|max:255',
            'isi'                => 'nullable|string',
            'foto'               => 'nullable|image|max:2048',
        ]);

        // Simpan file gambar layanan jika ada
        if ($request->hasFile('gambar_layanan')) {
            $validatedLayanan['gambar'] = $request->file('gambar_layanan')->store('layanan', 'public');
        }

        // Simpan data layanan
        $layanan = InformasiLayanan::create($validatedLayanan);

        // Simpan testimonial jika ada data nama dan isi
        if (!empty($validatedTestimonial['nama']) && !empty($validatedTestimonial['isi'])) {
            $testimonial = new Testimonial();
            $testimonial->layanan_id = $layanan->id;
            $testimonial->nama       = $validatedTestimonial['nama'];
            $testimonial->jabatan    = $validatedTestimonial['jabatan'] ?? null;
            $testimonial->isi        = $validatedTestimonial['isi'];

            if ($request->hasFile('fotol')) {
                $testimonial->foto = $request->file('foto ')
                    ->store('testimonial', 'public');
            }

            $testimonial->save();
        }

        return redirect()->route('admin.index')->with('active_tab', 'informasilayanan')->with('success', 'Informasi dan Layanan berhasil ditambahkan');
    }
}
