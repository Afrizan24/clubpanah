<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\InformasiLayanan;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $layanan = InformasiLayanan::all();
        return view('admin.layanan.index', compact('layanan'));
    }

    // Ganti nama method jadi store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari_jam' => 'required|string',
            'biaya' => 'nullable|numeric',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'gambar' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Pastikan file gambar ada dan diupload dengan benar
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $path = $request->file('gambar')->store('gambar', 'public');
            $validated['gambar'] = $path;
        }

        // Simpan data ke database
        InformasiLayanan::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.layanan.index')->with('success', 'Informasi layanan berhasil ditambahkan.');
    }
}
