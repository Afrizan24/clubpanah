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

        return view('admin.konten.galeri', compact('galeris'));
    }
    public function convertToEmbedLink($url)
    {
        $videoId = null;

        // https://www.youtube.com/watch?v=VIDEO_ID
        if (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
            $videoId = $queryParams['v'] ?? null;
        }
        // https://youtu.be/VIDEO_ID
        elseif (str_contains($url, 'youtu.be/')) {
            $videoId = trim(parse_url($url, PHP_URL_PATH), '/');
        }
        // https://www.youtube.com/embed/VIDEO_ID
        elseif (str_contains($url, 'youtube.com/embed/')) {
            $path = parse_url($url, PHP_URL_PATH);
            $segments = explode('/', trim($path, '/'));
            $videoId = end($segments);
        }
        // https://www.youtube.com/v/VIDEO_ID or other formats
        elseif (preg_match('/youtube\.com\/(?:v|e(?:mbed)?|shorts)\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            $videoId = $matches[1];
        }

        if ($videoId) {
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        return null;
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
        return redirect()->route('admin.index')->with('active_tab', 'Galeri')->with('successgaleri', 'Galeri berhasil ditambahkan');
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

        return redirect()->route('admin.index')->with('active_tab', 'Galeri')->with('successgaleri', 'Galeri berhasil ditambahkan');
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

        return redirect()->route('admin.index')->with('active_tab', 'galero')->with('successgaleri', 'Galeri berhasil ditambahkan');
    }
}
