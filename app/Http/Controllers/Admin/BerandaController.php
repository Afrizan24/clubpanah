<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\BerandaFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();

        // Initialize empty collections for each section
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

        // Merge with actual photos from database
        $dbFotos = BerandaFoto::all()->groupBy('section');
        $fotos = $fotos->merge($dbFotos);

        return view('admin.konten.beranda', compact('beranda', 'fotos'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'tentang_kami' => 'nullable|string',
            'alamat' => 'nullable|string',
            'google_maps' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_foto.*.judul' => 'nullable|string',
            'deskripsi_foto.*.deskripsi' => 'nullable|string',
        ]);

        $beranda = Beranda::first() ?? new Beranda();

        // Update beranda fields
        $beranda->judul = $request->judul ?? $beranda->judul;
        $beranda->deskripsi = $request->deskripsi ?? $beranda->deskripsi;
        $beranda->tentang_kami = $request->tentang_kami ?? $beranda->tentang_kami;
        $beranda->alamat = $request->alamat ?? $beranda->alamat;
        $beranda->google_maps = $request->google_maps ?? $beranda->google_maps;
        $beranda->whatsapp = $request->whatsapp ?? $beranda->whatsapp;
        $beranda->save();

        // Update descriptions for existing photos
        if ($request->has('deskripsi_foto')) {
            foreach ($request->deskripsi_foto as $section => $data) {
                $foto = BerandaFoto::where('section', $section)->first();
                if ($foto) {
                    // Update photo description
                    $foto->judul = $data['judul'] ?? $foto->judul;
                    $foto->deskripsi = $data['deskripsi'] ?? $foto->deskripsi;
                    $foto->save();
                }
            }
        }

        // Handle photo uploads
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $section => $file) {
                if ($file) {
                    try {
                        // Delete old photo if exists
                        $oldFoto = BerandaFoto::where('section', $section)->first();
                        if ($oldFoto) {
                            // Delete the old file from storage
                            if (Storage::exists($oldFoto->gambar)) {
                                Storage::delete($oldFoto->gambar);
                            }
                            $oldFoto->delete();
                        }

                        // Store the new photo
                        $path = $file->store('beranda', 'public');

                        // Create new photo record
                        BerandaFoto::create([
                            'section' => $section,
                            'gambar' => $path,
                            'judul' => $request->input('deskripsi_foto.' . $section . '.judul'),
                            'deskripsi' => $request->input('deskripsi_foto.' . $section . '.deskripsi')
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Error uploading file: ' . $e->getMessage());
                        return redirect()->back()->with('error', 'Error uploading file: ' . $e->getMessage());
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Beranda content updated successfully');
    }
}
