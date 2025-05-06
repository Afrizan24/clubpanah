
@if (session('successberita'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <span>{{ session('successberita') }}</span>
    </div>
@endif
<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Field untuk video URL -->
    <div class="mb-4">
        <label for="video_url" class="block text-gray-700 mb-2">Link Video (YouTube)</label>
        <input id="video_url" type="url" name="video_url" value="{{ old('video_url') }}" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500" required>
    </div>

    <!-- Field untuk Judul -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 mb-2">Judul Video</label>
        <input id="title" type="text" name="title" value="{{ old('title') }}" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"required>
    </div>

    <!-- Form untuk Gambar 1 dan Text 1 -->
    <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
            <label for="image1" class="block text-gray-700 mb-2">Gambar 1</label>
            <input id="image1" type="file" name="image1" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500"required>
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
            <input id="image2" type="file" name="image2" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="w-1/2">
            <label for="text2" class="block text-gray-700 mb-2">Text 2</label>
            <textarea id="text2" name="text2" rows="4" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">{{ old('text2') }}</textarea>
        </div>
    </div>

    <!-- Input Highlight -->
    <div class="mb-4">
        <label for="highlights" class="block text-gray-700 mb-2">Highlight Berita</label>
        <textarea id="highlights" name="highlights" rows="3" class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500">{{ old('highlights') }}</textarea>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        Tambah / Update
    </button>
</form>



<!-- Tombol Buka Modal Event -->
@if(isset($beritas) && $beritas->count() > 0)
    <button onclick="document.getElementById('eventModal').classList.remove('hidden')"
        class="bg-yellow-600 text-white px-5 py-2 rounded hover:bg-green-700 mt-1">
        Tambah Event
    </button>
@endif


<!-- Modal Event -->
<div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <!-- Tombol Close -->
        <button onclick="document.getElementById('eventModal').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

        <!-- Form Event -->
        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
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
            <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                Simpan Event
            </button>
        </form>
    </div>
</div>


