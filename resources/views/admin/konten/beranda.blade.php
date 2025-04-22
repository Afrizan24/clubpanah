<!-- resources/views/admin/konten/beranda.blade.php -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🎯 Hero Section</h2>

<!-- Form untuk Hero Section -->
<form id="berandaForm" action="#" method="POST">
    <!-- Judul Hero -->
    <div class="mb-4">
        <label for="judul" class="block text-sm font-medium mb-1">Judul</label>
        <input id="judul" type="text" class="w-full p-3 border rounded-lg" placeholder="Selamat Datang di Klub Panahan XYZ">
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
        <textarea id="tentang_kami" class="w-full p-3 border rounded-lg" rows="4" placeholder="Kami adalah komunitas panahan yang berdedikasi"></textarea>
    </div>

    <!-- Kegiatan & Program -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">🏹 Kegiatan & Program</h2>
    <div class="mb-4">
        <label for="judul_kegiatan" class="block text-sm font-medium mb-1">Judul Kegiatan</label>
        <input id="judul_kegiatan" type="text" class="w-full p-3 border rounded-lg" placeholder="Latihan Rutin Setiap Minggu">
    </div>

    <div class="mb-4">
        <label for="deskripsi_kegiatan" class="block text-sm font-medium mb-1">Deskripsi Kegiatan</label>
        <textarea id="deskripsi_kegiatan" class="w-full p-3 border rounded-lg" rows="3" placeholder="Kami mengadakan latihan setiap hari Minggu pagi di lapangan..."></textarea>
    </div>

    <!-- Galeri Foto -->
    <h2 class="text-2xl font-bold text-gray-700 mb-4 mt-8">📷 Galeri Foto</h2>
    <div class="mb-4">
        <label for="url_gambar_galeri" class="block text-sm font-medium mb-1">URL Gambar Galeri</label>
        <input id="url_gambar_galeri" type="text" class="w-full p-3 border rounded-lg" placeholder="https://...">
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
        <input id="whatsapp_kontak" type="text" class="w-full p-3 border rounded-lg" placeholder="+62...">
    </div>

    <!-- Tombol Simpan -->
    <button type="button" onclick="saveBeranda()" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Semua
    </button>
</form>

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
