<nav class="bg-gray-900 shadow-md py-4">
  <div class="max-w-7xl mx-auto px-4 flex justify-between items-center flex-wrap">
    
    <!-- Logo dan Judul -->
    <a href="/" class="flex items-center space-x-4">
      <img src="{{ asset ('gambar/logo anjas.png') }}" alt="Logo" class="w-20 h-auto">
      <h1 class="text-lg md:text-xl font-bold text-white">GOLD ARCHERY SAMARINDA</h1>
    </a>

    <!-- Hamburger Button -->
    <button id="menu-toggle" class="md:hidden text-white focus:outline-none transition-transform duration-300 ease-in-out">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Menu Links -->
      <!-- Menu Links -->
      <div id="menu"
          class="w-full md:flex md:items-center md:w-auto overflow-hidden transition-all duration-500 ease-in-out max-h-0 md:max-h-none hidden flex-col md:flex-row mt-4 md:mt-0 space-y-4 md:space-y-0 md:space-x-6">
        
        <a href="#" class="relative inline-block group text-white text-base font-medium px-2">
          <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
          <span class="transition-colors duration-300 group-hover:text-yellow-400">Struktur Organisasi</span>
        </a>

        <a href="#" class="relative inline-block group text-white text-base font-medium px-2">
          <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
          <span class="transition-colors duration-300 group-hover:text-yellow-400">Galeri</span>
        </a>

        <a href="#" class="relative inline-block group text-white text-base font-medium px-2">
          <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
          <span class="transition-colors duration-300 group-hover:text-yellow-400">Pemanah</span>
        </a>

        <a href="#" class="transition-transform duration-300 ease-in-out transform hover:scale-110 inline-block px-6 py-3 rounded bg-yellow-600 text-white text-base font-medium hover:bg-yellow-700">
          Informasi dan Layanan
        </a>
      </div>

</nav>

<script>
  // Toggle menu untuk mobile dengan animasi slide
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('menu');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');

    if (!menu.classList.contains('hidden')) {
      menu.style.maxHeight = menu.scrollHeight + "px";
    } else {
      menu.style.maxHeight = "0px";
    }
  });
</script>
