<!-- Struktur Organisasi Klub Panah -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Galeri Organisasi</h2>

<div class="container mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Kelola Galeri</h1>

    @if (session('successgaleri'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('successgaleri') }}
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
