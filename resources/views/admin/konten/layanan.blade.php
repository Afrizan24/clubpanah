<h2 class="text-2xl font-bold text-gray-700 mb-4">ℹ️ Informasi Layanan Klub</h2>

<form id="layananForm" method="POST" action="{{ route('admin.layanan.store') }}" enctype="multipart/form-data">
    @csrf <!-- CSRF Token -->

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Judul Layanan</label>
        <input type="text" name="judul" class="w-full p-3 border rounded-lg" placeholder="Contoh: Latihan Rutin Mingguan">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Deskripsi Layanan</label>
        <textarea name="deskripsi" class="w-full p-3 border rounded-lg" rows="3" placeholder="Penjelasan tentang layanan..."></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Hari & Jam Operasional</label>
        <input type="text" name="hari_jam" class="w-full p-3 border rounded-lg" placeholder="Contoh: Senin - Jumat, 08:00 - 10:00">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Biaya / Gratis</label>
        <input type="number" name="biaya" class="w-full p-3 border rounded-lg" placeholder="Contoh: Rp50.000 per sesi">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Lokasi Layanan</label>
        <input type="text" name="lokasi" class="w-full p-3 border rounded-lg" placeholder="Lokasi">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Kontak Layanan (WA)</label>
        <input type="text" name="kontak" class="w-full p-3 border rounded-lg" placeholder="+62...">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">URL Gambar / Ilustrasi</label>
        <input type="file" name="gambar" class="w-full p-3 border rounded-lg">
    </div>

    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Informasi Layanan
    </button>
</form>

<!-- TABEL OUTPUT -->
<h2 class="text-2xl font-bold text-gray-700 mt-10 mb-4">📋 Data Konten Layanan</h2>

<table class="min-w-full bg-white border border-gray-300 shadow rounded-lg overflow-hidden mb-10">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b">Judul Layanan</th>
            <th class="py-2 px-4 border-b">Deskripsi Layanan</th>
            <th class="py-2 px-4 border-b">Hari & Jam Operasional</th>
            <th class="py-2 px-4 border-b">Biaya</th>
            <th class="py-2 px-4 border-b">Lokasi</th>
            <th class="py-2 px-4 border-b">Kontak Layanan</th>
            <th class="py-2 px-4 border-b">URL Gambar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($layanan as $item)
        <tr>
            <td class="py-2 px-4 border-b">{{ $item->judul }}</td>
            <td class="py-2 px-4 border-b">{{ $item->deskripsi }}</td>
            <td class="py-2 px-4 border-b">{{ $item->hari_jam }}</td>
            <td class="py-2 px-4 border-b">{{ $item->biaya }}</td>
            <td class="py-2 px-4 border-b">{{ $item->lokasi }}</td>
            <td class="py-2 px-4 border-b">{{ $item->kontak }}</td>
            <td class="py-2 px-4 border-b">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Layanan" class="w-20 h-20 object-cover">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
