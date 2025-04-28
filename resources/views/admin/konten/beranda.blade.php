<!-- resources/views/admin/konten/beranda.blade.php -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🎯 Dashboard</h2>

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<!-- Form untuk Hero Section -->
<form action="{{ route('admin.beranda.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Judul Hero -->
    <div class="mb-4">
        <label for="judul" class="block text-sm font-medium mb-1">Judul</label>
        <input id="judul" name="judul" type="text" class="w-full p-3 border rounded-lg"
            value="{{ old('judul', $beranda->judul ?? '') }}" placeholder="Judul hero section">
        @error('judul')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Deskripsi Hero -->
    <div class="mb-4">
        <label for="deskripsi" class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" class="w-full p-3 border rounded-lg" rows="3"
            placeholder="Deskripsi hero section">{{ old('deskripsi', $beranda->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Foto Hero -->
    <div class="mb-4">
        <h3 class="text-lg font-medium mb-2">📷 Foto Dashboard</h3>
        <div class="grid grid-cols-2 gap-4">
            <!-- Hero 1 -->
            <div>
                <label class="block text-sm font-medium mb-1">Foto Hero 1</label>
                @if (isset($fotos['hero1']) && $fotos['hero1']->first())
                    <div class="mb-2">
                        <img src="{{ Storage::url($fotos['hero1']->first()->gambar) }}" alt="Hero 1"
                            class="w-32 h-32 object-cover">
                    </div>
                @endif
                <input type="file" name="fotos[hero1]" class="w-full p-3 border rounded-lg">
                <input type="text" name="deskripsi_foto[hero1]"
                    value="{{ old('deskripsi_foto.hero1', $fotos['hero1']->first()->deskripsi ?? '') }}"
                    class="w-full p-3 border rounded-lg mt-2" placeholder="Deskripsi foto">
            </div>
            <!-- Hero 2 -->
            <div>
                <label class="block text-sm font-medium mb-1">Foto Hero 2</label>
                @if (isset($fotos['hero2']) && $fotos['hero2']->first())
                    <div class="mb-2">
                        <img src="{{ Storage::url($fotos['hero2']->first()->gambar) }}" alt="Hero 2"
                            class="w-32 h-32 object-cover">
                    </div>
                @endif
                <input type="file" name="fotos[hero2]" class="w-full p-3 border rounded-lg">
                <input type="text" name="deskripsi_foto[hero2]"
                    value="{{ old('deskripsi_foto.hero2', $fotos['hero2']->first()->deskripsi ?? '') }}"
                    class="w-full p-3 border rounded-lg mt-2" placeholder="Deskripsi foto">
            </div>
        </div>
    </div>

    <!-- Tentang Kami -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📌 Deskripsi Galeri</h2>
    <div class="mb-4">
        <textarea id="tentang_kami" name="tentang_kami" class="w-full p-3 border rounded-lg" rows="4"
            placeholder="deskripsi Section">{{ old('tentang_kami', $beranda->tentang_kami ?? '') }}</textarea>
        @error('tentang_kami')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Kegiatan & Program -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">🏹 Kegiatan & Program</h2>
    <div class="mb-4">
        <label for="judul_kegiatan" class="block text-sm font-medium mb-1">Judul Kegiatan</label>
        <input id="judul_kegiatan" name="judul_kegiatan" type="text" class="w-full p-3 border rounded-lg"
            value="{{ old('judul_kegiatan', $beranda->judul_kegiatan ?? '') }}" placeholder="">
        @error('judul_kegiatan')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="deskripsi_kegiatan" class="block text-sm font-medium mb-1">Deskripsi Kegiatan</label>
        <textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan" class="w-full p-3 border rounded-lg" rows="3"
            placeholder="">{{ old('deskripsi_kegiatan', $beranda->deskripsi_kegiatan ?? '') }}</textarea>
        @error('deskripsi_kegiatan')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Galeri Foto -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📷 Galeri Foto</h2>
    <div class="mb-4">
        <div class="grid grid-cols-2 gap-4">
            @for ($i = 1; $i <= 4; $i++)
                <div>
                    <label class="block text-sm font-medium mb-1">Foto Galeri {{ $i }}</label>
                    @if (isset($fotos['galeri' . $i]) && $fotos['galeri' . $i]->first())
                        <div class="mb-2">
                            <img src="{{ Storage::url($fotos['galeri' . $i]->first()->gambar) }}"
                                alt="Galeri {{ $i }}" class="w-32 h-32 object-cover">
                        </div>
                    @endif
                    <input type="file" name="fotos[galeri{{ $i }}]" class="w-full p-3 border rounded-lg">
                    <input type="text" name="deskripsi_foto[galeri{{ $i }}][deskripsi]"
                        value="{{ old('deskripsi_foto.galeri' . $i, $fotos['galeri' . $i]->first()->deskripsi ?? '') }}"
                        class="w-full p-3 border rounded-lg mt-2" placeholder="Deskripsi foto">
                </div>
            @endfor
        </div>
    </div>

    <!-- About Us Photos -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📸 Foto About Us</h2>
    <div class="mb-4">
        <div class="grid grid-cols-3 gap-4">
            @for ($i = 1; $i <= 3; $i++)
                <div>
                    <label class="block text-sm font-medium mb-1">Foto About {{ $i }}</label>
                    @if (isset($fotos['about' . $i]) && $fotos['about' . $i]->first())
                        <div class="mb-2">
                            <img src="{{ Storage::url($fotos['about' . $i]->first()->gambar) }}"
                                alt="About {{ $i }}" class="w-32 h-32 object-cover">
                        </div>
                    @endif

                    <input type="file" name="fotos[about{{ $i }}]"
                        class="w-full p-3 border rounded-lg">
                    <input type="text" name="deskripsi_foto[about{{ $i }}][judul]"
                        value="{{ old('deskripsi_foto.about' . $i . '.judul', $fotos['about' . $i]->first()->judul ?? '') }}"
                        class="w-full p-3 border rounded-lg mt-2" placeholder="Judul Kegiatan">
                    <textarea name="deskripsi_foto[about{{ $i }}][deskripsi]" class="w-full p-3 border rounded-lg mt-2"
                        rows="3" placeholder="Deskripsi Kegiatan">{{ old('deskripsi_foto.about' . $i . '.deskripsi', $fotos['about' . $i]->first()->deskripsi ?? '') }}</textarea>
                </div>
            @endfor
        </div>
    </div>

    <!-- Kontak & Lokasi -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📞 Kontak & Lokasi</h2>
    <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium mb-1">Alamat</label>
        <input id="alamat" name="alamat" type="text" class="w-full p-3 border rounded-lg mb-2"
            value="{{ old('alamat', $beranda->alamat ?? '') }}" placeholder="Alamat klub">
        @error('alamat')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="google_maps" class="block text-sm font-medium mb-1">Google Maps Link</label>
        <input id="google_maps" name="google_maps" type="text" class="w-full p-3 border rounded-lg mb-2"
            value="{{ old('google_maps', $beranda->google_maps ?? '') }}" placeholder="Link ke Google Maps">
        @error('google_maps')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="whatsapp" class="block text-sm font-medium mb-1">WhatsApp / Kontak Person</label>
        <input id="whatsapp" name="whatsapp" type="text" class="w-full p-3 border rounded-lg"
            value="{{ old('whatsapp', $beranda->whatsapp ?? '') }}" placeholder="+62...">
        @error('whatsapp')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Tombol Simpan -->
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Perubahan
    </button>
</form>


<script>
    // Fungsi untuk menyimpan data form Beranda
    function saveBeranda() {
        const judul = document.getElementById('judul').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const gambarHero = document.getElementById('gambar_hero').value;
        const tentangKami = document.getElementById('tentang_kami').value;
        const judulKegiatan = document.getElementById('judul_kegiatan').value;
        const deskripsiKegiatan = document.getElementById('deskripsi_kegiatan').value;
        const galeriUrl = document.getElementById('url_gambar_galeri').value;
        const alamat = document.getElementById('alamat').value;
        const googleMapsLink = document.getElementById('google_maps_link').value;
        const whatsappKontak = document.getElementById('whatsapp_kontak').value;

        // Menampilkan data yang disimpan
        alert(
            `Data disimpan:\nJudul: ${judul}\nDeskripsi: ${deskripsi}\nGambar Hero URL: ${gambarHero}\nTentang Kami: ${tentangKami}\nJudul Kegiatan: ${judulKegiatan}\nDeskripsi Kegiatan: ${deskripsiKegiatan}\nURL Galeri: ${galeriUrl}\nAlamat: ${alamat}\nGoogle Maps: ${googleMapsLink}\nWhatsApp: ${whatsappKontak}`
        );

        // Reset form setelah menyimpan
        document.getElementById('berandaForm').reset();
    }
</script>
