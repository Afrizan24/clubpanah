<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(5);
        return view('admin.konten.contact', compact('pesans'));
    }

    public function destroy($id)
    {
        Pesan::findOrFail($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }

    public function reply(Request $request)
    {
        $request->validate([
            'pesan_id' => 'required|exists:pesans,id',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Kirim email
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to($request->email)
                ->subject($request->subject);
        });

        // Tandai sebagai sudah dibalas
        $pesan = Pesan::findOrFail($request->pesan_id);
        $pesan->is_replied = true;
        $pesan->save();

         // Hapus pesan setelah dibalas
        $pesan->delete();

        return back()->with('success', 'Balasan berhasil dikirim!');
    }
}
