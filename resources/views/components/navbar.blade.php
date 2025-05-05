<nav class="bg-gray-900 shadow-md py-5 fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">

        <!-- Logo & Judul -->
        <a href="/" class="flex items-center space-x-4 group">
            <img src="{{ asset('gambar/logo anjas.png') }}" alt="Logo" class="w-16 h-auto">
            <div class="relative whitespace-nowrap">
                <h1
                    class="text-white text-base md:text-xl font-bold group-hover:text-yellow-400 transition-colors duration-300">
                    GOLD ARCHERY SAMARINDA
                </h1>
                <span
                    class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
            </div>
        </a>

        <!-- Hamburger Button (aktif sampai <lg) -->
        <div class="lg:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Menu (hanya muncul di layar lg ke atas) -->
        <div class="hidden lg:flex space-x-6">
            <a href="/strukturorganisasi" class="text-white hover:text-yellow-400 transition py-2">Struktur
                Organisasi</a>
            <a href="/galeri" class="text-white hover:text-yellow-400 transition py-2">Galeri</a>
            <a href="/berita" class="text-white hover:text-yellow-400 transition py-2">Berita</a>
            <a href="/informasidanlayanan"
                class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition">
                Informasi dan Layanan
            </a>
        </div>
    </div>

    <!-- Mobile Menu (aktif untuk <lg) -->
    <div id="menu-wrapper" class="lg:hidden overflow-hidden transition-all duration-500 ease-in-out max-h-0">
        <div id="menu" class="flex flex-col px-4 space-y-4 pt-4 pb-6 bg-gray-800">
            <a href="/strukturorganisasi" class="text-white hover:text-yellow-400 transition">Struktur Organisasi</a>
            <a href="/galeri" class="text-white hover:text-yellow-400 transition">Galeri</a>
            <a href="/berita" class="text-white hover:text-yellow-400 transition">Berita</a>
            <a href="/informasidanlayanan"
                class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition">
                Informasi dan Layanan
            </a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('menu-wrapper');
        const menu = document.getElementById('menu');

        let isOpen = false;

        toggle.addEventListener('click', function() {
            isOpen = !isOpen;
            if (isOpen) {
                wrapper.style.maxHeight = menu.scrollHeight + 'px';
            } else {
                wrapper.style.maxHeight = '0px';
            }
        });

        // Reset max-height saat resize ke desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                wrapper.style.maxHeight = null;
            } else {
                wrapper.style.maxHeight = '0px';
                isOpen = false;
            }
        });
    });
</script>
