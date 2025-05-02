<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiLayanan;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    // Display index page
    public function index()
    {
        $layanan = InformasiLayanan::all();
        $testimonials = Testimonial::with('layanan')->latest()->take(3)->get();

        return view('admin.layanan.index', [
            'layanan' => $layanan,
            'testimonials' => $testimonials,
            'active_tab' => request()->get('active_tab', 'informasilayanan')
        ]);
    }

    // Store or update service and testimonial
    public function store(Request $request)
    {
        if ($request->has('update_mode') && $request->update_mode === 'testimonial_only') {
            // Validasi testimonial
            $validated = $request->validate([
                'nama'       => 'required|string|max:100',
                'jabatan'    => 'required|string|max:100',
                'isi'        => 'required|string|max:255',
                'foto'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Cek dan hapus testimonial tertua jika sudah ada 3
            if (Testimonial::count() >= 3) {
                $oldest = Testimonial::oldest()->first();
                if ($oldest && $oldest->foto && Storage::disk('public')->exists($oldest->foto)) {
                    Storage::disk('public')->delete($oldest->foto);
                }
                $oldest?->delete();
            }

            // Upload foto
            $path = $request->file('foto')->store('testimonials', 'public');

            // Simpan testimonial baru
            Testimonial::create([
                'nama' => $validated['nama'],
                'jabatan' => $validated['jabatan'],
                'isi' => $validated['isi'],
                'foto' => $path,
            ]);

            return back()->with('success', 'Testimonial berhasil ditambahkan.');
        }

        // Validasi input layanan + testimonial pertama
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari_jam' => 'required|string|max:100',
            'biaya' => 'required|numeric',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',

            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'isi' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan layanan
        $layanan = InformasiLayanan::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'hari_jam' => $validated['hari_jam'],
            'biaya' => $validated['biaya'],
            'lokasi' => $validated['lokasi'],
            'kontak' => $validated['kontak'],
        ]);

        // Simpan testimonial pertama
        $path = $request->file('foto')->store('testimonials', 'public');
        Testimonial::create([
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'isi' => $validated['isi'],
            'foto' => $path,
        ]);

        return back()->with('success', 'Layanan dan testimonial berhasil ditambahkan.');
    }

    // Delete testimonial
    public function deleteTestimonial(Testimonial $testimonial)
    {
        try {
            // Hapus file jika ada
            if ($testimonial->foto && Storage::disk('public')->exists($testimonial->foto)) {
                Storage::disk('public')->delete($testimonial->foto);
            }

            // Hapus record testimonial
            $testimonial->delete();

            return back()
                ->with('success', 'Testimonial berhasil dihapus')
                ->with('active_tab', 'testimonial');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus testimonial: ' . $e->getMessage())
                ->with('active_tab', 'testimonial');
        }
    }
}
