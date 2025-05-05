@extends('layouts.admin')

@section('content')
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">🎛️ Admin Panel</h1>
    <p class="text-gray-500 text-lg mb-6">Kelola konten website</p>

    <!-- Tabs Navigasi -->
    <div class="flex flex-wrap gap-3 mb-8">
        <button data-tab="beranda" onclick="switchTab('beranda')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Beranda</button>
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
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Informasi
            Layanan</button>
    </div>

    <!-- Tab Content -->
    <div id="beranda" class="tab-content hidden">
        @include('admin.konten.beranda', ['beranda' => $beranda, 'fotos' => $fotos])
    </div>

    <div id="galeri" class="tab-content hidden">
        @include('admin.konten.galeri', ['galeris' => $galeris, 'editGaleri' => $editGaleri])
    </div>

    <div id="pemanah" class="tab-content hidden">
        @include('admin.konten.pemanah')
    </div>

        <div id="berita" class="tab-content hidden">
            @include('admin.konten.berita') <!-- Pastikan data 'beritas' dikirim dengan benar -->
        </div>
        
        <div id="informasilayanan" class="tab-content hidden">
            @include('admin.konten.layanan')
        </div>

        
    
        
        <div id="detailpemanah" class="tab-content hidden">
            @include('admin.konten.detailpemanah')
        </div>
        
        


@endsection


{{-- <!-- Modal Login -->
<div id="loginModal"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
        <h2 class="text-2xl font-bold mb-4">Login Admin</h2>
        <p class="mb-6 text-gray-600">Silakan login terlebih dahulu untuk mengakses halaman ini.</p>
        <form id="loginForm" class="space-y-4">
            <input type="text" placeholder="Username" class="w-full border rounded px-3 py-2" required>
            <input type="password" placeholder="Password" class="w-full border rounded px-3 py-2" required>
            <div class="flex justify-center gap-4">
                <button onclick="login()"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
                <button onclick="cancelLogin()"
                    class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
            </div>
    </div>
</div> --}}
@php
    $activeTab = session('active_tab'); // dari session
@endphp


@section('scripts')
    <script>
        function switchTab(tabId) {
            // Sembunyikan semua tab
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            // Tampilkan tab yang dipilih
            document.getElementById(tabId).classList.remove('hidden');

            // Update tombol tab
            document.querySelectorAll('.tab-button').forEach(el => {
                el.classList.remove('bg-blue-600', 'text-white', 'shadow-md');
            });
            const activeBtn = document.querySelector(`[data-tab="${tabId}"]`);
            if (activeBtn) {
                activeBtn.classList.add('bg-blue-600', 'text-white', 'shadow-md');
            }

            // Simpan ke localStorage
            localStorage.setItem('activeAdminTab', tabId);
        }

        window.onload = () => {
            // Prioritas: session dari backend > localStorage > default
            let activeTab = "{{ $activeTab ?? '' }}";
            if (!activeTab) {
                activeTab = localStorage.getItem('activeAdminTab') || 'beranda';
            }
            switchTab(activeTab);
        };
    </script>





    {{-- <!-- Script Modal Login -->
    <script>
        let pendingTabId = null; // Menyimpan tab yang ingin dipindahkan
        let hasLoggedIn = false; // Mengecek apakah admin sudah login

        function switchTab(tabId) {
            // Jika admin sudah login, lanjutkan
            if (hasLoggedIn) {
                moveToTab(tabId);
            } else {
                // Tampilkan modal login jika belum login
                pendingTabId = tabId;
                openLoginModal();
            }
        }

        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }

        function login() {
            // Set login status ke true (simulasi login)
            hasLoggedIn = true;
            closeLoginModal();
            moveToTab(pendingTabId); // Setelah login, pindah ke tab yang dipilih
        }

        function cancelLogin() {
            pendingTabId = null; // Reset pending tab jika batal
            closeLoginModal();
        }

        function moveToTab(tabId) {
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
    </script> --}}
@endsection
