<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        $events = Event::all();

        return view('admin.konten.berita', compact('beritas', 'events'));
    }

    public function create()
    {
        return view('admin.konten.berita');
    }

// Menyimpan hanya berita
public function storeBerita(Request $request)
{
    $request->validate([
        'video_url' => 'nullable|url',
        'title' => 'required|string|max:255',
        'text1' => 'nullable|string',
        'text2' => 'nullable|string',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'highlights' => 'nullable|string',
    ]);

    if (Berita::count() >= 5) {
        $oldest = Berita::oldest()->first();
        $this->deleteOldFiles($oldest);
        $oldest->delete();
    }

    $image1Path = $request->hasFile('image1') ? $request->file('image1')->store('images', 'public') : null;
    $image2Path = $request->hasFile('image2') ? $request->file('image2')->store('images', 'public') : null;

    Berita::create([
        'video_url' => $request->video_url,
        'title' => $request->title,
        'image1' => $image1Path,
        'text1' => $request->text1,
        'image2' => $image2Path,
        'text2' => $request->text2,
        'highlights' => json_encode(explode(',', $request->highlights)),
    ]);

    return redirect()->route('admin.index')->with('active_tab', 'berita')->with('success', 'Berita berhasil ditambahkan');
}


// Menyimpan hanya event
public function storeEvent(Request $request)
{
    Event::truncate();

    $request->validate([
        'textevent' => 'required|string',
        'imageevent' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageeventPath = $request->hasFile('imageevent') ? $request->file('imageevent')->store('imageevent', 'public') : null;

    Event::create([
        'description' => $request->textevent,
        'imageevent' => $imageeventPath,
    ]);

    return redirect()->route('admin.index')->with('active_tab', 'event')->with('success', 'Event berhasil ditambahkan');
}
        protected function deleteOldFiles($berita)
        {
            if ($berita->image1 && Storage::disk('public')->exists($berita->image1)) {
                Storage::disk('public')->delete($berita->image1);
            }

            if ($berita->image2 && Storage::disk('public')->exists($berita->image2)) {
                Storage::disk('public')->delete($berita->image2);
            }
            return redirect()->route('admin.index')->with('active_tab', 'berita')->with('success', 'Event berhasil ditambahkan');
        
        }

}