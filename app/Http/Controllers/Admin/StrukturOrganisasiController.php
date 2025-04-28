<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    // Tampilkan halaman Struktur Organisasi
    public function index(Request $request)
    {
        $struktur = StrukturOrganisasi::all();
        $editStruktur = null;

        if ($request->has('edit')) {
            $editStruktur = StrukturOrganisasi::findOrFail($request->edit);
        }

        return view('admin.konten.strukturorganisasi', compact('struktur', 'editStruktur'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('nama', 'jabatan');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        StrukturOrganisasi::create($data);
        return redirect()->back()->with('success', 'Beranda content updated successfully');
    }

    // Update data
    public function update(Request $request, $id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('nama', 'jabatan');

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
                Storage::disk('public')->delete($struktur->foto);
            }
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $struktur->update($data);
        return redirect()->route('admin.index')->with('success', 'Beranda content updated successfully')->with('tab', 'struktur');
    }

    // Hapus data
    public function destroy($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
            Storage::disk('public')->delete($struktur->foto);
        }

        $struktur->delete();

        return redirect()->back()->with('success', 'Beranda content updated successfully');
    }
}
