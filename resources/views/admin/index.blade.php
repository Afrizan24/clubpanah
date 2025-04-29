@extends('layouts.admin')

@section('content')
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">🎛️ Admin Panel</h1>
    <p class="text-gray-500 text-lg mb-6">Kelola konten website</p>

    <!-- Tabs Navigasi -->
    <div class="flex flex-wrap gap-3 mb-8">
        <button data-tab="beranda" onclick="switchTab('beranda')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Beranda</button>
        <button data-tab="struktur" onclick="switchTab('struktur')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Struktur
            Organisasi</button>
        <button data-tab="galeri" onclick="switchTab('galeri')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Galeri</button>
        <button data-tab="pemanah" onclick="switchTab('pemanah')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Pemanah</button>
        <button data-tab="berita" onclick="switchTab('berita')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Berita</button>
        <button data-tab="detailpemanah" onclick="switchTab('detailpemanah')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Detail
            Pemanah</button>
        <button data-tab="informasilayanan" onclick="switchTab('informasilayanan')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Informasi Layanan</button>
    </div>

    <!-- Tab Content -->
    <div id="beranda" class="tab-content hidden">
        @include('admin.konten.beranda', ['beranda' => $beranda, 'fotos' => $fotos])
    </div>

    <div id="struktur" class="tab-content hidden">
        @include('admin.konten.strukturorganisasi', [
            'struktur' => $struktur,
            'editStruktur' => $editStruktur,
        ])
    </div>

    <div id="galeri" class="tab-content hidden">
        @include('admin.konten.galeri', ['galeris' => $galeris, 'editGaleri' => $editGaleri])
    </div>

    <div id="pemanah" class="tab-content hidden">
        @include('admin.konten.pemanah')
    </div>

    <div id="detailpemanah" class="tab-content hidden">
        @include('admin.konten.detailpemanah')
    </div>
    <div id="informasilayanan" class="tab-content hidden">
        @include('admin.konten.layanan')
    </div>

    <div id="berita" class="tab-content hidden">
        @include('admin.konten.berita') <!-- Pastikan data 'beritas' dikirim dengan benar -->
    </div>
@endsection

@section('scripts')
    <script>
        function switchTab(tabId) {
            // Sembunyikan semua tab
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            // Tampilkan tab yang dipilih
            document.getElementById(tabId).classList.remove('hidden');

            // Hapus styling aktif dari semua tombol
            document.querySelectorAll('.tab-button').forEach(el => {
                el.classList.remove('bg-blue-600', 'text-white', 'shadow-md');
            });

            // Tambahkan styling aktif ke tombol tab yang dipilih
            const activeBtn = document.querySelector(`[data-tab="${tabId}"]`);
            if (activeBtn) {
                activeBtn.classList.add('bg-blue-600', 'text-white', 'shadow-md');
            }
        }

        // Periksa parameter query di URL dan tentukan tab yang aktif
        window.onload = () => {
            const urlParams = new URLSearchParams(window.location.search);
            const activeTab = urlParams.get('tab') || 'beranda'; // Default tab 'beranda' jika tidak ada query parameter
            switchTab(activeTab); // Panggil switchTab sesuai dengan parameter yang ada di URL
        };
    </script>
@endsection
