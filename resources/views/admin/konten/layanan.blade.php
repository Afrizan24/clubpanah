<h2 class="text-2xl font-bold text-gray-700 mb-6">ℹ️ Informasi Layanan Klub</h2>

<form id="layananForm" method="POST" action="{{ route('admin.layanan.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Grid 2 kolom -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1">Judul Layanan</label>
            <input type="text" name="judul" class="w-full p-3 border rounded-lg" placeholder="Contoh: Latihan Rutin Mingguan">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Hari & Jam Operasional</label>
            <input type="text" name="hari_jam" class="w-full p-3 border rounded-lg" placeholder="Contoh: Senin - Jumat, 08:00 - 10:00">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Biaya / Gratis</label>
            <input type="number" name="biaya" class="w-full p-3 border rounded-lg" placeholder="Contoh: 50000">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Lokasi Layanan</label>
            <input type="text" name="lokasi" class="w-full p-3 border rounded-lg" placeholder="Lokasi">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Kontak Layanan (WA)</label>
            <input type="text" name="kontak" class="w-full p-3 border rounded-lg" placeholder="+62...">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Nama Testimonial</label>
            <input type="text" name="nama" class="w-full p-3 border rounded-lg" placeholder="Nama Lengkap">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Jabatan Testimonial</label>
            <input type="text" name="jabatan" class="w-full p-3 border rounded-lg" placeholder="Jabatan">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Isi Pesan</label>
            <input type="text" name="isi" class="w-full p-3 border rounded-lg" placeholder="Isi Pesan">
        </div>
    </div>

    <!-- Deskripsi panjang -->
    <div>
        <label class="block text-sm font-medium mb-1">Deskripsi Layanan</label>
        <textarea name="deskripsi" class="w-full p-3 border rounded-lg" rows="4" placeholder="Penjelasan tentang layanan..."></textarea>
    </div>

    <!-- Upload -->
    <div>
        <label class="block text-sm font-medium mb-1">Foto Testimonial</label>
        <input type="file" name="foto_testimonial" class="w-full p-3 border rounded-lg">
    </div>

    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">
        💾 Simpan Informasi Layanan
    </button>
</form>

<!-- TABEL OUTPUT -->
<h2 class="text-2xl font-bold text-gray-700 mt-12 mb-4">📋 Data Konten Layanan</h2>

<div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50 text-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">Judul</th>
                <th class="px-4 py-2 text-left">Deskripsi</th>
                <th class="px-4 py-2 text-left">Hari & Jam</th>
                <th class="px-4 py-2 text-left">Biaya</th>
                <th class="px-4 py-2 text-left">Lokasi</th>
                <th class="px-4 py-2 text-left">Kontak</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($layanan as $item)
            <tr>
                <td class="px-4 py-2">{{ $item->judul }}</td>
                <td class="px-4 py-2">{{ $item->deskripsi }}</td>
                <td class="px-4 py-2">{{ $item->hari_jam }}</td>
                <td class="px-4 py-2">{{ $item->biaya }}</td>
                <td class="px-4 py-2">{{ $item->lokasi }}</td>
                <td class="px-4 py-2">{{ $item->kontak }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
