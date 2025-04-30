<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700 mb-2">Link Video (YouTube)</label>
        <input type="url" name="video_url" value="{{ old('video_url') }}"
        class="w-full border p-2 rounded" >
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 mb-2">Judul Video</label>
        <input type="text" name="title" value="{{ old('title') }}"
            class="w-full border p-2 rounded" >
    </div>
    

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Gambar 1</label>
            <input type="file" name="image1" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi Gambar 1</label>
            <input type="text" name="text1" value=""
            class="w-full border p-2 rounded">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Gambar 2</label>
            <input type="file" name="image2" class="w-full border p-2 rounded">
            <!-- Image Preview (if available) -->
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi Gambar 2</label>
            <input type="text" name="text2" value=""
            class="w-full border p-2 rounded">
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 mb-2">Highlight Berita (pisahkan dengan koma)</label>
        <textarea name="highlights" rows="3" class="w-full border p-2 rounded"></textarea>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Tambah / Update
        </button>

        <a href="#" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Batal</a>
    </div>
</form>
