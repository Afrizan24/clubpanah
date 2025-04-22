@extends('layouts.admin')

@section('content')
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">🎛️ Admin Panel</h1>
    <p class="text-gray-500 text-lg mb-6">Kelola konten website</p>

    <!-- Tabs Navigasi -->
    <div class="flex flex-wrap gap-3 mb-8">
        <button data-tab="beranda" onclick="switchTab('beranda')" class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Beranda</button>
        <button data-tab="trainers" onclick="switchTab('trainers')" class="tab-button px-5 py-2 text-sm rounded-lg border  border-gray-600 bg-blue  hover:bg-blue-100">Struktur Organisasi</button>
        <button data-tab="about" onclick="switchTab('about')" class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue  hover:bg-blue-100">Galeri</button>
        <button data-tab="features" onclick="switchTab('features')" class="tab-button px-5 py-2 text-sm rounded-lg border  border-gray-600 bg-blue  hover:bg-blue-100">Pemanah</button>
        <button data-tab="news" onclick="switchTab('news')" class="tab-button px-5 py-2 text-sm rounded-lg border  border-gray-600 bg-blue  hover:bg-blue-100">Informasi Layanan</button>
    </div>

    <!-- Tab Content -->
    <div id="beranda" class="tab-content hidden">
        @include('admin.konten.beranda')
    </div>

    <div id="trainers" class="tab-content hidden">
        @include('admin.konten.strukturorganisasi')
    </div>

    <div id="about" class="tab-content hidden">
       @include('admin.konten.galeri')
    </div>

    <div id="features" class="tab-content hidden">
      @include('admin.konten.pemanah')
    </div>

    <div id="news" class="tab-content hidden">
        @include('admin.konten.layanan')
    </div>
@endsection

@section('scripts')
<script>
    function switchTab(tabId) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

        // Show selected tab
        document.getElementById(tabId).classList.remove('hidden');

        // Remove active styling from all buttons
        document.querySelectorAll('.tab-button').forEach(el => {
            el.classList.remove('bg-blue-600', 'text-white', 'shadow-md');
        });

        // Add active styling to selected tab button
        const activeBtn = document.querySelector(`[data-tab="${tabId}"]`);
        if (activeBtn) {
            activeBtn.classList.add('bg-blue-600', 'text-white', 'shadow-md');
        }
    }

    window.onload = () => switchTab('beranda');
</script>
@endsection
