<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function index()
    {
        $struktur = StrukturOrganisasi::all();

        return view('admin.konten.detailpemanah', compact('struktur'));
    }
}
