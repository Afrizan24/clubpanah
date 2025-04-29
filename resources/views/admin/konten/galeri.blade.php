<!-- Struktur Organisasi Klub Panah -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Galeri Organisasi</h2>

<!-- <form id="strukturForm">
  
    <label class="block text-sm font-medium mb-1">Photo</label>
    <input type="text" name="ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="Deskripsi Photo">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">

  
    <label class="block text-sm font-medium mb-1">Vidio</label>
    <input type="text" name="wakil_ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="link Vidio">
    <input type="text" name="wakil_ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="Deskripsi Vidio">



    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Struktur
    </button>
</form>


<h2 class="text-2xl font-bold text-gray-700 mt-10 mb-4">📋 Data Konten Galeri</h2>
<table class="min-w-full bg-white border border-gray-300 shadow rounded-lg overflow-hidden mb-10">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b">Photo</th>
            <th class="py-2 px-4 border-b">Deskripsi Photo</th>
            <th class="py-2 px-4 border-b">Vidio</th>
            <th class="py-2 px-4 border-b">Deskripsi Vidio</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table> -->

<div class="container mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Kelola Galeri</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah / Edit --}}
    <div class="bg-white p-6 rounded shadow mb-6">
        <form action="{{ $editGaleri ? route('admin.galeri.update', $editGaleri->id) : route('admin.galeri.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($editGaleri)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Kategori</label>
                <select name="kategori" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Anggota"
                        {{ old('kategori', $editGaleri->kategori ?? '') == 'Anggota' ? 'selected' : '' }}>Anggota
                    </option>
                    <option value="Kompetisi"
                        {{ old('kategori', $editGaleri->kategori ?? '') == 'Kompetisi' ? 'selected' : '' }}>Kompetisi
                    </option>
                    <option value="Latihan"
                        {{ old('kategori', $editGaleri->kategori ?? '') == 'Latihan' ? 'selected' : '' }}>Latihan
                    </option>
                    <option value="Video"
                        {{ old('kategori', $editGaleri->kategori ?? '') == 'Video' ? 'selected' : '' }}>Video
                    </option>
                </select>
            </div>

            <div class="mb-4" id="gambarContainer">
                <label class="block text-gray-700 mb-2">Gambar</label>
                <input type="file" name="gambar" id="gambarInput" {{ $editGaleri ? '' : 'required' }}
                    class="w-full border p-2 rounded">
                @if ($editGaleri && $editGaleri->gambar)
                    <img src="{{ asset('storage/' . $editGaleri->gambar) }}" class="w-32 mt-2 rounded" alt="Preview">
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Link Video</label>
                <input type="url" name="video_link" value="{{ old('video_link', $editGaleri->video_link ?? '') }}"
                    class="w-full border p-2 rounded">
            </div>
            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    {{ $editGaleri ? 'Update' : 'Tambah' }}
                </button>
                @if ($editGaleri)
                    <a href="{{ route('admin.galeri.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Batal</a>
                @endif
            </div>
        </form>
    </div>



    {{-- Daftar Galeri --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($galeris as $galeri)
            <div class="bg-white p-4 rounded shadow">
                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="w-full h-48 object-cover rounded mb-4"
                    alt="Video Dari YT">
                <h3 class="text-lg font-bold mb-2">{{ ucfirst($galeri->kategori) }}</h3>

                <div class="flex gap-2">
                    <a href="{{ route('admin.galeri.index', ['edit' => $galeri->id]) }}"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>

                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST"
                        onsubmit="return confirm('Yakin mau hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriSelect = document.querySelector('select[name="kategori"]');
        const gambarInput = document.getElementById('gambarInput');
        const gambarContainer = document.getElementById('gambarContainer');

        // Function to handle hiding/showing gambar input
        function toggleGambarInput() {
            if (kategoriSelect.value === 'Video') {
                gambarContainer.style.display = 'none';
                gambarInput.removeAttribute('required'); // Remove the 'required' attribute
            } else {
                gambarContainer.style.display = 'block';
                gambarInput.setAttribute('required', 'required'); // Make it required again
            }
        }

        // Run the function when the page loads and when the category changes
        toggleGambarInput();
        kategoriSelect.addEventListener('change', toggleGambarInput);
    });
</script>
