<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $galeris = Galeri::all();

        return view('galeri', compact('galeris'));
    }
}
