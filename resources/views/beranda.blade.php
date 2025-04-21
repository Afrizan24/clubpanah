<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Club Panah</title>
  <link href="src/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Gentis+Sans:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">

  <!-- Navbar -->
   <x-navbar></x-navbar>

  <!-- Content 1 -->
   <section class="bg-cover bg-center bg-no-repeat px-10 py-10" style="background-image: url('');">

<!-- Teks -->
    <div class="flex items-center justify-center min-h-screen ml-8">
      <div class="flex flex-col items-center -mt-32">
          <h1 class="text-8xl text-yellow-500 font-bold font-sans">GOLD ARCHERY SAMARINDA</h1>
          <p class="text-2xl font-bold text-gray-600 mb-3">APA SAJA, NGAPAIN SAJA</p>

          <a href="#" class="text-center inline-block px-8 py-3 rounded-full bg-yellow-500 text-white text-base font-bold hover:bg-yellow-700 transition mb-8">
            Mau Jasa apa hari ini ?
          </a>
        </div>
      </div>
    </div>
   </section>
   
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