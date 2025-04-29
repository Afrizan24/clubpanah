<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Ambil semua berita dari database
        $beritas = Berita::all();

        // Kembalikan view 'admin.konten.berita' dan kirim data berita
        return view('admin.konten.berita', compact('berita'));
    }

    public function create()
    {
        return view('admin.konten.berita');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'video_url' => 'required|url',
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'highlights' => 'nullable|string',
        ]);

        // Handle file uploads
        $image1Path = null;
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('images', 'public');
        }

        $image2Path = null;
        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('images', 'public');
        }

        // Simpan data ke database
        Berita::create([
            'video_url' => $request->video_url,
            'title' => $request->title,
            'image1' => $image1Path,
            'text1' => $request->text1,
            'image2' => $image2Path,
            'text2' => $request->text2,
            'highlights' => $request->highlights,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.index')->with('active_tab', 'berita')->with('success', 'Struktur berhasil ditambahkan');
    }
}
