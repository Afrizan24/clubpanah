<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    // Tampilkan halaman Struktur Organisasi
    public function index()
    {
        $data = StrukturOrganisasi::all();
        return view('admin.konten.pemanah', compact('data'));
    }

    public function create()
    {
        return view('admin.struktur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'keahlian' => 'nullable|string',
            'divisi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal_bergabung' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_pemanah', 'public');
            $validated['foto'] = $path;
        }

        StrukturOrganisasi::create($validated);
        return redirect()->route('struktur.index')->with('successpemanah', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $data = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur.show', compact('data'));
    }

    public function edit($id)
    {
        $data = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = StrukturOrganisasi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'keahlian' => 'nullable|string',
            'divisi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal_bergabung' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_pemanah', 'public');
            $validated['foto'] = $path;
        }

        $data->update($validated);
        return redirect()->route('struktur.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = StrukturOrganisasi::findOrFail($id);
        $data->delete();

        return redirect()->route('struktur.index')->with('success', 'Data berhasil dihapus.');
    }
}
