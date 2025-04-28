<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;

class StrukturOrganisasiComponentController extends Controller
{

    public function index()
    {
        // Ambil data struktur organisasi berdasarkan jabatan
        $pembina = StrukturOrganisasi::where('jabatan', 'Pembina')->get();
        $ketua = StrukturOrganisasi::where('jabatan', 'Ketua')->first();
        $sekretaris = StrukturOrganisasi::where('jabatan', 'Sekretaris')->first();
        $bendahara = StrukturOrganisasi::where('jabatan', 'Bendahara')->first();
        $divisi = StrukturOrganisasi::whereIn('jabatan', ['Sekretaris Divisi A', 'Sekretaris Divisi B', 'Bendahara Divisi A', 'Bendahara Divisi B'])->get();
        $anggota = StrukturOrganisasi::where('jabatan', 'Anggota')->get();

        // Kembalikan view dan kirim data
        return view('strukturorganisasi', compact('pembina', 'ketua', 'sekretaris', 'bendahara', 'divisi', 'anggota'));
    }

}
