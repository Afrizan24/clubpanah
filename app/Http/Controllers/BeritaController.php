<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $berita = Berita::all(); // Ambil semua berita

        return view('berita', compact('berita')); // Kirim data ke view
    }

}
