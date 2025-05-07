<!-- Struktur Organisasi Klub Panah -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Galeri Organisasi</h2>

<div class="container mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Kelola Galeri</h1>

    @if (session('successgaleri'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('successgaleri') }}
        </div>
    @endif

    {{-- Form Tambah --}}
    <div class="bg-white p-6 rounded shadow mb-6">
        <form action="{{ $editGaleri ? route('admin.galeri.update', $editGaleri->id) : route('admin.galeri.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($editGaleri)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Kategori</label>
                <select name="kategori" id="kategoriSelect" class="w-full border p-2 rounded" required>
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

            <div class="mb-4" id="videoContainer" style="display: none;">
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


    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach ($galeris as $galeri)
            <div class="bg-white p-2 rounded shadow text-sm">
                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="w-full h-24 object-cover rounded mb-2"
                    alt="">
                <strong class="block text-center mb-1">{{ ucfirst($galeri->kategori) }}</strong>

                {{-- Form Edit --}}
                <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-1">
                    @csrf
                    @method('PUT')

                    <select name="kategori" class="w-full border rounded p-1 text-xs">
                        @foreach (['Anggota', 'Kompetisi', 'Latihan', 'Video'] as $kategori)
                            <option value="{{ $kategori }}"
                                {{ $galeri->kategori == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                        @endforeach
                    </select>

                    @if ($galeri->kategori !== 'Video')
                        <input type="file" name="gambar" class="w-full border rounded p-1 text-xs">
                    @endif

                    <input type="url" name="video_link" value="{{ $galeri->video_link }}" placeholder="Link video"
                        class="w-full border rounded p-1 text-xs">

                    <div class="flex justify-between gap-1">
                        <button type="submit"
                            class="bg-blue-500 text-white px-2 py-1 rounded text-xs w-full">Simpan</button>
                    </div>
                </form>

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST"
                    onsubmit="return confirm('Yakin?')" class="mt-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs w-full">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>



</div>
<!-- Modal Edit Galeri -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white w-full max-w-lg rounded shadow p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">&times;</button>
        <h2 class="text-xl font-bold mb-4">Edit Galeri</h2>
        <form id="editForm" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="editId">

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Kategori</label>
                <select name="kategori" id="editKategori" class="w-full border p-2 rounded" required>
                    <option value="Anggota">Anggota</option>
                    <option value="Kompetisi">Kompetisi</option>
                    <option value="Latihan">Latihan</option>
                    <option value="Video">Video</option>
                </select>
            </div>

            <div class="mb-4" id="editGambarContainer">
                <label class="block text-gray-700 mb-2">Gambar</label>
                <input type="file" name="gambar" id="editGambar" class="w-full border p-2 rounded">
                <img id="editPreview" src="" class="w-32 mt-2 rounded" alt="Preview">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Link Video</label>
                <input type="url" name="video_link" id="editVideoLink" class="w-full border p-2 rounded">
            </div>

            <div class="flex justify-end gap-2">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                <button type="button" onclick="closeModal()"
                    class="bg-gray-400 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('kategoriSelect').addEventListener('change', function() {
        var kategori = this.value;
        var gambarContainer = document.getElementById('gambarContainer');
        var videoContainer = document.getElementById('videoContainer');

        if (kategori === 'Video') {
            gambarContainer.style.display = 'none';
            videoContainer.style.display = 'block';
        } else {
            gambarContainer.style.display = 'block';
            videoContainer.style.display = 'none';
        }
    });

    window.addEventListener('load', function() {
        var kategori = document.getElementById('kategoriSelect').value;
        var gambarContainer = document.getElementById('gambarContainer');
        var videoContainer = document.getElementById('videoContainer');

        if (kategori === 'Video') {
            gambarContainer.style.display = 'none';
            videoContainer.style.display = 'block';
        } else {
            gambarContainer.style.display = 'block';
            videoContainer.style.display = 'none';
        }
    });
</script>
