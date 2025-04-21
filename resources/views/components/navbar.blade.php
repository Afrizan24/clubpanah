<nav class="bg-white shadow-md py-4 mb-6">
  <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-between items-center">
    
    <!-- Logo -->
    <a href="/" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600">
      <svg class="w-10 h-10 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12L12 4L20 12M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
      </svg>
      <h1 class="text-lg font-bold">GOLD ARCHERY SAMARINDA</h1>
    </a>

    <!-- Hamburger Button -->
    <button id="menu-toggle" class="block md:hidden text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Menu Links -->
    <div id="menu" class="w-full md:flex md:items-center md:space-x-4 md:w-auto hidden flex-col md:flex-row mt-4 md:mt-0 space-y-2 md:space-y-0">
      <a href="/" class="text-gray-700 hover:text-blue-600">Home</a>
      <a href="/" class="text-gray-700 hover:text-blue-600">Struktur Organisasi</a>
      <a href="/" class="text-gray-700 hover:text-blue-600">Galeri</a>
      <a href="/" class="inline-block px-6 py-3 rounded bg-green-600 text-white text-base font-medium hover:bg-green-700 transition">Book New</a>
  
    </div> 
  </div>
</nav>

<script>
  // Toggle menu untuk mobile
  document.getElementById('menu-toggle').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
  });
</script>
