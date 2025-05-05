<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        Pesan::create([
            'nama' => $request->name,
            'email' => $request->email,
            'pesan' => $request->message,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

  
}
