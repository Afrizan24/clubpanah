<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Field untuk video URL -->
    <div class="mb-4">
        <label for="video_url" class="block text-gray-700 mb-2">Link Video (YouTube)</label>
        <input id="video_url" type="url" name="video_url" value="{{ old('video_url') }}" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Field untuk Judul -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 mb-2">Judul Video</label>
        <input id="title" type="text" name="title" value="{{ old('title') }}" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Form untuk Gambar 1 dan Text 1 -->
    <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
            <label for="image1" class="block text-gray-700 mb-2">Gambar 1</label>
            <input id="image1" type="file" name="image1" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="w-1/2">
            <label for="text1" class="block text-gray-700 mb-2">Text 1</label>
            <textarea id="text1" name="text1" rows="4" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">{{ old('text1') }}</textarea>
        </div>
    </div>

    <!-- Form untuk Gambar 2 dan Text 2 -->
    <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
            <label for="image2" class="block text-gray-700 mb-2">Gambar 2</label>
            <input id="image2" type="file" name="image2" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="w-1/2">
            <label for="text2" class="block text-gray-700 mb-2">Text 2</label>
            <textarea id="text2" name="text2" rows="4" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">{{ old('text2') }}</textarea>
        </div>
    </div>

    <!-- Input Highlight -->
    <div class="mb-4">
        <label for="highlights" class="block text-gray-700 mb-2">Highlight Berita (pisahkan dengan koma)</label>
        <textarea id="highlights" name="highlights" rows="3" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">{{ old('highlights') }}</textarea>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        Tambah / Update
    </button>
</form>





{{-- Form Untuk event --}}
<form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" class="mt-10">
    @csrf
    <!-- Deskripsi Event -->
    <div class="mb-4">
        <label for="textevent" class="block text-gray-700 mb-2">Deskripsi Event</label>
        <textarea id="textevent" name="textevent" rows="4" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-green-500">{{ old('textevent') }}</textarea>
    </div>


    <!-- Gambar Event -->
    <div class="mb-4">
        <label for="imageevent" class="block text-gray-700 mb-2">Gambar Event</label>
        <input id="imageevent" type="file" name="imageevent" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-green-500">
    </div>

    <!-- Tombol Kirim -->
    <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">Simpan Event</button>
</form>

