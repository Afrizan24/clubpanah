<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
{
    //
    public function index()
    {
        $anggota = StrukturOrganisasi::where('jabatan', 'Anggota')->get();
        $ketua = StrukturOrganisasi::where('jabatan', 'Ketua')->first();
        $sekretaris = StrukturOrganisasi::where('jabatan', 'Sekretaris')->first();
        $bendahara = StrukturOrganisasi::where('jabatan', 'Bendahara')->first();
        $pembina = StrukturOrganisasi::where('jabatan', 'Pembina')->get();
        return view('strukturorganisasi', compact('anggota', 'ketua', 'sekretaris', 'bendahara', 'pembina'));
    }
}
