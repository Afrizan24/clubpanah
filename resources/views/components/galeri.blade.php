<section class="bg-white antialiased" x-data="{ filter: 'all' }">
  <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
    <div class="max-w-screen-xl mx-auto">
      <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-12">GALERI BERSAMA ARCHERY SAMARINDA</h2>

      <!-- Filter Buttons -->
      <div class="flex justify-center gap-3 mb-8 flex-wrap">
        <button @click="filter = 'all'" :class="{ 'bg-yellow-500 text-white': filter === 'all' }"
          class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Semua</button>
        <button @click="filter = 'latihan'" :class="{ 'bg-yellow-500 text-white': filter === 'latihan' }"
          class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Latihan</button>
        <button @click="filter = 'kompetisi'" :class="{ 'bg-yellow-500 text-white': filter === 'kompetisi' }"
          class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Kompetisi</button>
        <button @click="filter = 'anggota'" :class="{ 'bg-yellow-500 text-white': filter === 'anggota' }"
          class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Anggota</button>
      </div>

      <!-- Galeri Grid -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Item Galeri Besar -->
        <div x-show="filter === 'all' || filter === 'latihan'" class="col-span-2 row-span-2">
          <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Galeri Besar"
            class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105">
        </div>

        <!-- Galeri Lainnya (kasih kategori masing-masing) -->
        <img x-show="filter === 'all' || filter === 'latihan'" src="{{ asset('storage/gambar/kegiatan1 (1).png') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'kompetisi'" src="{{ asset('storage/gambar/kegiatan1 (2).png') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'anggota'" src="{{ asset('storage/gambar/kegiatan1 (3).png') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'latihan'" src="{{ asset('storage/gambar/kegiatan1 (4).png') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'kompetisi'" src="{{ asset('storage/gambar/kegiatan1 (5).png') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'anggota'" src="{{ asset('storage/gambar/kegiatan1 (6).png') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'latihan'" src="{{ asset('storage/gambar/archer.jpeg') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
        <img x-show="filter === 'all' || filter === 'anggota'" src="{{ asset('storage/gambar/archer.jpeg') }}" class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" alt="">
      </div>
    </div>
<!--  -->
    <!-- Video Dokumentasi -->
    <div class="mt-12 max-w-screen-xl mx-auto px-4">
      <h3 class="text-2xl font-bold mb-4 text-gray-900 text-center">Video Dokumentasi</h3>
      <div class="relative w-full" style="padding-top: 40.10%;">
        <iframe class="absolute top-0 left-0 w-full h-full rounded-lg shadow-lg"
          src="https://www.youtube.com/embed/p7hc3nX9zAI"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>