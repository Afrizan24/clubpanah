<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $beritas = Berita::all(); // Ambil semua berita
           // Mengambil data berita pertama

           $berita = Berita::all();

           // Kirim data berita ke view
           return view('berita', compact('berita'));
    }

}
