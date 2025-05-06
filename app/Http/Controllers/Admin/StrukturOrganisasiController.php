<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use App\Models\StatistikLatihan;
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

        $member = StrukturOrganisasi::create($validated);

        $member->statistikLatihans()->create([
            'push_up' => 10,
            'tahan_nafas' => 10,
            'on_target' => 10,
            'off_target' => 10,
            'latihan_konsentrasi' => 10,
            'waktu_latihan' => 10
        ]);

        return redirect()->route('admin.index')
            ->with('active_tab', 'pemanah')
            ->with('successstruktur', 'Informasi dan Layanan berhasil ditambahkan');
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
        return redirect()->route('admin.index')->with('active_tab', 'pemanah')->with('successstruktur', 'Informasi dan Layanan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = StrukturOrganisasi::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.index')->with('active_tab', 'pemanah')->with('successstruktur', 'Informasi dan Layanan berhasil ditambahkan');
    }
}
