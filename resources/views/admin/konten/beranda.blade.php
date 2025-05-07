<h2 class="text-3xl font-bold text-gray-800 mb-6">🎯 Dashboard</h2>

@if (session('successberanda'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <span>{{ session('successberanda') }}</span>
    </div>
@endif

<form action="{{ route('admin.beranda.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf
    @method('PUT')

    <!-- Hero Section -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Hero Section</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input id="judul" name="judul" type="text"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                    value="{{ old('judul', $beranda->judul ?? '') }}">
                @error('judul')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">{{ old('deskripsi', $beranda->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            @foreach (['hero1', 'hero2'] as $hero)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto {{ ucfirst($hero) }}</label>
                    @if (isset($fotos[$hero]) && $fotos[$hero]->first())
                        <img src="{{ Storage::url($fotos[$hero]->first()->gambar) }}" alt="{{ ucfirst($hero) }}"
                            class="w-32 h-32 object-cover rounded mb-2">
                    @endif
                    <input type="file" name="fotos[{{ $hero }}]" class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="deskripsi_foto[{{ $hero }}]"
                        value="{{ old('deskripsi_foto.' . $hero, $fotos[$hero]->first()->deskripsi ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg mt-2" placeholder="Deskripsi foto">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tentang Kami -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Deskripsi Galeri</h3>
        <textarea id="tentang_kami" name="tentang_kami" rows="4"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">{{ old('tentang_kami', $beranda->tentang_kami ?? '') }}</textarea>
        @error('tentang_kami')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Galeri Foto -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Galeri Foto</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 1; $i <= 4; $i++)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Galeri {{ $i }}</label>
                    @if (isset($fotos['galeri' . $i]) && $fotos['galeri' . $i]->first())
                        <img src="{{ Storage::url($fotos['galeri' . $i]->first()->gambar) }}"
                            class="w-full h-32 object-cover rounded mb-2">
                    @endif
                    <input type="file" name="fotos[galeri{{ $i }}]"
                        class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="deskripsi_foto[galeri{{ $i }}][deskripsi]"
                        value="{{ old('deskripsi_foto.galeri' . $i, $fotos['galeri' . $i]->first()->deskripsi ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg mt-2" placeholder="Deskripsi foto">
                </div>
            @endfor
        </div>
    </div>

    <!-- About Us -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Foto About Us</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 3; $i++)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">About {{ $i }}</label>
                    @if (isset($fotos['about' . $i]) && $fotos['about' . $i]->first())
                        <img src="{{ Storage::url($fotos['about' . $i]->first()->gambar) }}"
                            class="w-full h-32 object-cover rounded mb-2">
                    @endif
                    <input type="file" name="fotos[about{{ $i }}]"
                        class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="deskripsi_foto[about{{ $i }}][judul]"
                        value="{{ old('deskripsi_foto.about' . $i . '.judul', $fotos['about' . $i]->first()->judul ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg mt-2" placeholder="Judul Kegiatan">
                    <textarea name="deskripsi_foto[about{{ $i }}][deskripsi]" rows="3"
                        class="w-full px-4 py-2 border rounded-lg mt-2" placeholder="Deskripsi Kegiatan">{{ old('deskripsi_foto.about' . $i . '.deskripsi', $fotos['about' . $i]->first()->deskripsi ?? '') }}</textarea>
                </div>
            @endfor
        </div>
    </div>

    <!-- Kontak & Lokasi -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Kontak & Lokasi</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input id="alamat" name="alamat" type="text" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('alamat', $beranda->alamat ?? '') }}">
                @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="google_maps" class="block text-sm font-medium text-gray-700 mb-1">Google Maps</label>
                <input id="google_maps" name="google_maps" type="text" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('google_maps', $beranda->google_maps ?? '') }}">
                @error('google_maps')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp</label>
                <input id="whatsapp" name="whatsapp" type="text" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('whatsapp', $beranda->whatsapp ?? '') }}">
                @error('whatsapp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-right">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">
            💾 Simpan Perubahan
        </button>
    </div>
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
