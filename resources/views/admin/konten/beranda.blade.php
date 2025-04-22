<!-- resources/views/admin/konten/beranda.blade.php -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🎯 Hero Section</h2>

<!-- Form untuk Hero Section -->
<form id="berandaForm" action="#" method="POST">
    <!-- Judul Hero -->
    <div class="mb-4">
        <label for="judul" class="block text-sm font-medium mb-1">Judul</label>
        <input id="judul" type="text" class="w-full p-3 border rounded-lg" placeholder="Judul hero section">
    </div>

    <!-- Deskripsi Hero -->
    <div class="mb-4">
        <label for="deskripsi" class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea id="deskripsi" class="w-full p-3 border rounded-lg" rows="3" placeholder="Deskripsi hero section"></textarea>
    </div>

    <!-- Gambar Hero URL -->
    <div class="mb-4">
        <label for="gambar_hero" class="block text-sm font-medium mb-1">Gambar Hero URL</label>
        <input id="gambar_hero" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">
    </div>

    <!-- Tentang Kami -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📌 Tentang Kami</h2>
    <div class="mb-4">
        <label for="tentang_kami" class="block text-sm font-medium mb-1">Deskripsi Singkat</label>
        <textarea id="tentang_kami" class="w-full p-3 border rounded-lg" rows="4" placeholder="deskripsi Section"></textarea>
    </div>

    <!-- Kegiatan & Program -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">🏹 Kegiatan & Program</h2>
    <div class="mb-4">
        <label for="judul_kegiatan" class="block text-sm font-medium mb-1">Judul Kegiatan</label>
        <input id="judul_kegiatan" type="text" class="w-full p-3 border rounded-lg" placeholder="">
    </div>

    <div class="mb-4">
        <label for="deskripsi_kegiatan" class="block text-sm font-medium mb-1">Deskripsi Kegiatan</label>
        <textarea id="deskripsi_kegiatan" class="w-full p-3 border rounded-lg" rows="3" placeholder=""></textarea>
    </div>

    <!-- Galeri Foto -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📷 Galeri Foto</h2>
    <div class="mb-4">
        <label for="url_gambar_galeri" class="block text-sm font-medium mb-1">URL Gambar Galeri</label>
        <input id="url_gambar_galeri" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">
    </div>

    <!-- Kontak & Lokasi -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📞 Kontak & Lokasi</h2>
    <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium mb-1">Alamat</label>
        <input id="alamat" type="text" class="w-full p-3 border rounded-lg mb-2" placeholder="Alamat klub">
        <input id="google_maps_link" type="text" class="w-full p-3 border rounded-lg mb-2" placeholder="Link ke Google Maps">
    </div>

    <div class="mb-4">
        <label for="whatsapp_kontak" class="block text-sm font-medium mb-1">WhatsApp / Kontak Person</label>
        <input id="whatsapp_kontak" type="number" class="w-full p-3 border rounded-lg" placeholder="+62...">
    </div>

    <!-- Tombol Simpan -->
    <button type="button" onclick="saveBeranda()" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Semua
    </button>
</form>


<!-- TABEL OUTPUT -->
<h2 class="text-2xl font-bold text-gray-700 mt-10 mb-4">📋 Data Konten Beranda</h2>
<table class="min-w-full bg-white border border-gray-300 shadow rounded-lg overflow-hidden mb-10">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b">Judul Hero</th>
            <th class="py-2 px-4 border-b">Deskripsi</th>
            <th class="py-2 px-4 border-b">Gambar</th>
            <th class="py-2 px-4 border-b">Tentang Kami</th>
            <th class="py-2 px-4 border-b">Judul Kegiatan</th>
            <th class="py-2 px-4 border-b">Deskripsi Kegiatan</th>
            <th class="py-2 px-4 border-b">Galeri</th>
            <th class="py-2 px-4 border-b">Alamat</th>
            <th class="py-2 px-4 border-b">Google Maps</th>
            <th class="py-2 px-4 border-b">WA</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>
</table>







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
        alert(`Data disimpan:\nJudul: ${judul}\nDeskripsi: ${deskripsi}\nGambar Hero URL: ${gambarHero}\nTentang Kami: ${tentangKami}\nJudul Kegiatan: ${judulKegiatan}\nDeskripsi Kegiatan: ${deskripsiKegiatan}\nURL Galeri: ${galeriUrl}\nAlamat: ${alamat}\nGoogle Maps: ${googleMapsLink}\nWhatsApp: ${whatsappKontak}`);

        // Reset form setelah menyimpan
        document.getElementById('berandaForm').reset();
    }
</script>
