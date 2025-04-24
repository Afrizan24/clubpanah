<!-- Section 3 -->
<section class="bg-white">
  <div class="max-w-screen-xl mx-auto py-12 lg:py-20 ml-2">
    
    <!-- Row 1: Teks kiri, gambar kanan -->
    <div class="grid grid-cols-1 lg:grid-cols-12 items-center mb-16">
      
      <!-- Gambar utama lebih besar + teks di bawahnya -->
      <div class="lg:col-span-7 order-2 lg:order-1 flex flex-col items-center">
        <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Gold Archery Samarinda" class="rounded-xl shadow-lg w-full max-w-md lg:max-w-lg h-auto">
        <h1 class="font-bold mt-2 text-2xl">WUISHH</h1>
      </div>

     <!-- Dua gambar kecil + teks masing-masing -->
<div class="lg:col-span-5 order-1 lg:order-2 flex flex-col items-start justify-start h-full ml-10">
  <!-- Gambar kecil dalam 1 baris -->
  <div class="flex space-x-16 mb-6">
    <!-- Gambar 2 + teks -->
    <div class="flex flex-col items-center space-y-2">
      <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Gambar 2" class="w-100 h-46 object-cover rounded-md shadow-md">
      <p class="text-gray-600 text-sm text-center">Pendampingan langsung oleh pelatih</p>
    </div>
    <!-- Gambar 3 + teks -->
    <div class="flex flex-col items-center space-y-2">
      <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Gambar 3" class="w-100 h-46 object-cover rounded-md shadow-md">
      <p class="text-gray-600 text-sm text-center">Peningkatan teknik panahan</p>
    </div>
  </div>



  <!-- TOmbol Navigasi -->
  <div class="flex justify-center items-center gap-3 mt-6 w-full">
  <!-- Tombol sebelumnya -->
  <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-base rounded-md shadow-sm">
    ‹
  </button>
  <!-- Halaman -->
  <button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md shadow-md">1</button>
  <button class="px-4 py-2 bg-gray-200 hover:bg-yellow-400 text-gray-700 rounded-md shadow-sm">2</button>
  <button class="px-4 py-2 bg-gray-200 hover:bg-yellow-400 text-gray-700 rounded-md shadow-sm">3</button>
  <span class="text-gray-500 font-medium">...</span>
  <button class="px-4 py-2 bg-gray-200 hover:bg-yellow-400 text-gray-700 rounded-md shadow-sm">5</button>
  <!-- Tombol selanjutnya -->
  <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-base rounded-md shadow-sm">
    ›
  </button>
</div>
<!--  -->


  </div>
</section>
<!-- end Section 3 -->
