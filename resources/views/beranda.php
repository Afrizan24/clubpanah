<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disuruh Suruh</title>
  <link href="src/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Gentis+Sans:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
  <!-- Navbar -->
  <nav class="bg-black shadow-md py-4 mb-1">
    <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-between items-center">

    <!-- Logo -->
      <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
        </svg>
      </a>

    <!-- Hamburger Button -->
      <button id="menu-toggle" class="block md:hidden text-gray-700 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <img src="" alt="">
      </button> 

    <!-- Menu Links -->
      <div id="menu" class="w-full md:flex md:items-center md:space-x-4 md:w-auto hidden flex-col md:flex-row mt-4 md:mt-0 space-y-2 md:space-y-0">
        <a href="#" class="inline-block px-7 py-2 rounded bg-transparent text-white text-base font-medium hover:bg-yellow-800 hover:text-white focus:bg-yellow-500 focus:text-white transition">CONTACT</a>
        <a href="#" class="inline-block px-7 py-2 rounded bg-transparent text-white text-base font-medium hover:bg-yellow-500 hover:text-white focus:bg-yellow-500 focus:text-white transition">ABOUT US</a>
        <a href="#" class="inline-block px-7 py-2 rounded bg-transparent text-white text-base font-medium hover:bg-yellow-500 hover:text-white focus:bg-yellow-500 focus:text-white transition">LOGIN</a>
      </div>
    </div>
  </nav>

  <!-- Content -->

  <script>
    // Toggle menu untuk mobile
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('menu');
      menu.classList.toggle('hidden');
    });
  </script>

  <!-- Footer -->
  <footer class="bg-black text-gray-200 py-1 mt-auto">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-center items-center">
      <h1 class="text-center text-lg">Team Github</h1>
    </div> 
  <!-- Copyright -->
    <div class="text-center text-gray-500 text-xs mt-2">
      2025 Disuruh Suruh. Design by Team Github. &copy; 2025.
    </div>
  </footer>
</body>
</html>