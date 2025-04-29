<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; // Asumsinya model Galeri sudah ada
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Tampilkan semua data galeri
    // Tampilkan semua galeri + form tambah/edit
    public function index(Request $request)
    {
        $galeris = Galeri::all();
        $editGaleri = null;

        if ($request->has('edit')) {
            $editGaleri = Galeri::findOrFail($request->edit);
        }

        return view('admin.konten.galeri', compact('galeris', 'editGaleri'));
    }
    public function convertToEmbedLink($url)
    {
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtube\.com\/(?:[^\/]+\/[^\/]+\/|(?:v|e(?:mbed)?)\/)([^"&?\/\s]{11})/', $url, $matches)) {
            $videoId = $matches[1];
        } else {
            return null;
        }

        return "https://www.youtube.com/embed/{$videoId}";
    }


    // Store galeri baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Gambar menjadi opsional
            'video_link' => 'nullable|url',
        ]);

        // Convert URL ke embed link jika ada
        $embedLink = $this->convertToEmbedLink($validated['video_link'] ?? '');

        // Simpan gambar jika ada
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('galeri', 'public');
        }

        Galeri::create([
            'kategori' => $validated['kategori'],
            'gambar' => $path,
            'video_link' => $embedLink,
        ]);
        return redirect()->route('admin.index')->with('active_tab', 'galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video_link' => 'nullable|url',
        ]);

        // Convert URL ke embed link jika ada
        $embedLink = $this->convertToEmbedLink($validated['video_link'] ?? $galeri->video_link);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($galeri->gambar);

            // Upload gambar baru
            $path = $request->file('gambar')->store('galeri', 'public');
            $galeri->gambar = $path;
        }

        $galeri->kategori = $validated['kategori'];
        $galeri->video_link = $embedLink;
        $galeri->save();

        return redirect()->route('admin.index')->with('active_tab', 'Galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    // Delete galeri
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus gambar jika ada
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        // Hapus video_link jika ada
        $galeri->video_link = null;

        // Simpan perubahan
        $galeri->save();

        // Hapus galeri dari database
        $galeri->delete();

        return redirect()->route('admin.index')->with('active_tab', 'galero')->with('success', 'Galeri berhasil ditambahkan');
    }
}
