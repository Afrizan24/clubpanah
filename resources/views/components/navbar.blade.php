<nav class="bg-gray-900 shadow-md py-6">
  <div class="max-w-7xl mx-auto px-4 flex justify-between items-center flex-wrap">
    
    <!-- Logo dan Judul -->
    <div class="flex items-center space-x-4">
      <a href="/" class="flex items-center space-x-4 group relative">
        <img src="{{ asset('gambar/logo anjas.png') }}" alt="Logo" class="w-20 h-auto">
        <div class="relative">
          <h1 class="transition-colors duration-300 group-hover:text-yellow-400 text-lg md:text-xl font-bold text-white">
            GOLD ARCHERY SAMARINDA
          </h1>
          <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        </div>
      </a>
    </div>

    <!-- Hamburger Button -->
    <div class="md:hidden">
      <button id="menu-toggle" class="text-white focus:outline-none transition-transform duration-300 ease-in-out">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Menu Links -->
    <div id="menu"
      class="w-full overflow-hidden transition-[max-height] duration-500 ease-in-out max-h-0 hidden md:max-h-none md:flex md:items-center md:w-auto flex-col md:flex-row mt-4 md:mt-0 space-y-4 md:space-y-0 md:space-x-6">
      
      <a href="/strukturorganisasi" class="relative inline-block group text-white text-base font-medium px-2">
        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        <span class="transition-colors duration-300 group-hover:text-yellow-400">Struktur Organisasi</span>
      </a>

      <a href="/galeri" class="relative inline-block group text-white text-base font-medium px-2">
        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        <span class="transition-colors duration-300 group-hover:text-yellow-400">Galeri</span>
      </a>

      <a href="#" class="relative inline-block group text-white text-base font-medium px-2">
        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        <span class="transition-colors duration-300 group-hover:text-yellow-400">Berita</span>
      </a>

      <a href="/informasidanlayanan"
        class="inline-block px-6 py-3 rounded bg-yellow-600 text-white text-base font-medium hover:bg-yellow-700 group">
        <span class="inline-block transition-transform duration-300 ease-in-out group-hover:scale-110">
          Informasi dan Layanan
        </span>
      </a>

    </div>
  </div>
</nav>

<script>
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('menu');

  toggle.addEventListener('click', () => {
    const isHidden = menu.classList.contains('hidden');

    if (isHidden) {
      menu.classList.remove('hidden');
      menu.style.maxHeight = menu.scrollHeight + "px";
    } else {
      menu.style.maxHeight = menu.scrollHeight + "px";
      setTimeout(() => {
        menu.style.maxHeight = "0px";
      }, 10);
      setTimeout(() => {
        if (window.innerWidth < 768) {
          menu.classList.add('hidden');
        }
      }, 500);
    }
  });

  // Auto reset saat resize ke desktop
  window.addEventListener('resize', () => {
    if (window.innerWidth >= 768) {
      menu.classList.remove('hidden');
      menu.style.maxHeight = null;
    } else {
      menu.classList.add('hidden');
      menu.style.maxHeight = "0px";
    }
  });
</script>
