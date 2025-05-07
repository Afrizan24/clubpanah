<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiLayanan;
use App\Models\Testimonial;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    const MAX_TESTIMONIALS = 3;

    /**
     * Display index page
     */
    public function index()
    {
        return view('admin.layanan.index', [
            'layanan' => InformasiLayanan::all(),
            'testimonials' => Testimonial::latest()->take(3)->get(),
            'profile' => Profile::find(1) ?? new Profile(),
            'active_tab' => request()->get('active_tab', 'informasilayanan')
        ]);
    }

    /**
     * Store or update service and testimonial
     */
    public function store(Request $request)
    {
        switch ($request->update_mode) {
            case 'testimonial_only':
                return $this->storeTestimonial($request);

            case 'update_profile':
                return $this->updateProfile($request);

            default:
                return $this->storeServiceWithTestimonial($request);
        }
    }

    /**
     * Store new testimonial
     */
    protected function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'isi'     => 'required|string|max:255',
            'foto'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (Testimonial::count() >= self::MAX_TESTIMONIALS) {
            $this->removeOldestTestimonial();
        }

        $path = $request->file('foto')->store('testimonials', 'public');

        Testimonial::create([
            'nama'    => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'isi'     => $validated['isi'],
            'foto'    => $path,
        ]);

        return back()
            ->with('success', 'Testimonial berhasil ditambahkan.')
            ->with('active_tab', 'testimonial');
    }

    /**
     * Update profile information
     */
    protected function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Dapatkan atau buat profile
        $profile = Profile::firstOrNew(['id' => 1]);
        
        // Hapus logo lama jika ada file baru diupload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            
            // Simpan logo baru
            $path = $request->file('logo')->store('profile', 'public');
            $profile->logo = $path;
        }
        
        // Update description
        $profile->description = $validated['description'];
        
        // Simpan perubahan
        $profile->save();

        return back()
            ->with('success', 'Profil berhasil diperbarui.')
            ->with('active_tab', 'profile');
    }

    /**
     * Store new service with initial testimonial
     */
    protected function storeServiceWithTestimonial(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari_jam'  => 'required|string|max:100',
            'biaya'     => 'required|numeric',
            'lokasi'    => 'required|string|max:255',
            'kontak'    => 'required|string|max:20',

            'nama'      => 'required|string|max:100',
            'jabatan'   => 'required|string|max:100',
            'isi'       => 'required|string|max:255',
            'foto'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Store service info
        InformasiLayanan::create([
            'judul'     => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'hari_jam'  => $validated['hari_jam'],
            'biaya'     => $validated['biaya'],
            'lokasi'    => $validated['lokasi'],
            'kontak'    => $validated['kontak'],
        ]);

        // Store testimonial info
        $path = $request->file('foto')->store('testimonials', 'public');

        Testimonial::create([
            'nama'    => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'isi'     => $validated['isi'],
            'foto'    => $path,
        ]);

        return back()
            ->with('success', 'Layanan dan testimonial berhasil ditambahkan.')
            ->with('active_tab', 'informasilayanan');
    }

    /**
     * Delete testimonial
     */
    public function deleteTestimonial(Testimonial $testimonial)
    {
        try {
            if ($testimonial->foto && Storage::disk('public')->exists($testimonial->foto)) {
                Storage::disk('public')->delete($testimonial->foto);
            }

            $testimonial->delete();

            return back()
                ->with('success', 'Testimonial berhasil dihapus')
                ->with('active_tab', 'testimonial');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus testimonial: ' . $e->getMessage())
                ->with('active_tab', 'testimonial');
        }
    }

    /**
     * Remove oldest testimonial when limit reached
     */
    protected function removeOldestTestimonial()
    {
        $oldest->delete();
        $oldest = Testimonial::oldest()->first();
        if ($oldest) {
            if ($oldest->foto && Storage::disk('public')->exists($oldest->foto)) {
                Storage::disk('public')->delete($oldest->foto);
            }
        }
    }

    /**
     * Show edit form for a specific service
     */
    public function edit($id)
    {
        $layanan = InformasiLayanan::findOrFail($id);
        return view('admin.konten.layanan-edit', compact('layanan'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari_jam'  => 'required|string|max:100',
            'biaya'     => 'required|numeric',
            'lokasi'    => 'required|string|max:255',
            'kontak'    => 'required|string|max:20',
        ]);
    
        $layanan = InformasiLayanan::findOrFail($id);
        $layanan->update($validated);
    
        return redirect()->route('admin.index')->with('success', 'Informasi layanan berhasil diperbarui.');
    }
}
