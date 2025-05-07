@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Edit Informasi Layanan</h2>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="judul" class="block font-semibold">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full border px-3 py-2 rounded" 
                value="{{ old('judul', $layanan->judul) }}" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="w-full border px-3 py-2 rounded" required>
                {{ old('deskripsi', $layanan->deskripsi) }}
            </textarea>
        </div>

        <div class="mb-4">
            <label for="hari_jam" class="block font-semibold">Hari & Jam</label>
            <input type="text" name="hari_jam" id="hari_jam" class="w-full border px-3 py-2 rounded" 
                value="{{ old('hari_jam', $layanan->hari_jam) }}" required>
        </div>

        <div class="mb-4">
            <label for="biaya" class="block font-semibold">Biaya</label>
            <input type="number" name="biaya" id="biaya" class="w-full border px-3 py-2 rounded" 
                value="{{ old('biaya', $layanan->biaya) }}" required>
        </div>

        <div class="mb-4">
            <label for="lokasi" class="block font-semibold">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="w-full border px-3 py-2 rounded" 
                   value="{{ old('lokasi', $layanan->lokasi) }}" required>
        </div>

        <div class="mb-4">
            <label for="kontak" class="block font-semibold">Kontak</label>
            <input type="text" name="kontak" id="kontak" class="w-full border px-3 py-2 rounded" 
                   value="{{ old('kontak', $layanan->kontak) }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection