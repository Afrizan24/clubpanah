<!-- Section 3 -->
<section class="bg-gray-300">
  <div class="max-w-screen-xl mx-auto py-12 lg:py-20 px-4">
    
    <!-- Row 1: Video + Gambar + Info -->
    <div class="grid grid-cols-1 lg:grid-cols-12 items-center mb-16 gap-8">
      
      <!-- Video utama + judul -->
      <div class="lg:col-span-7 order-2 lg:order-1 flex flex-col items-center">
        <div class="w-full max-w-md lg:max-w-lg relative" style="padding-top: 56.25%;">
          <iframe 
            class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
            src="https://www.youtube.com/embed/TVdETT8OT6g"
            title="Video Kegiatan"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
          </iframe>
        </div>
        <h1 class="font-bold mt-4 text-2xl text-center text-gray-800">WUISHH</h1>
      </div>

      <!-- Gambar pendukung + highlight berita + navigasi -->
      <div class="lg:col-span-5 order-1 lg:order-2 flex flex-col items-start justify-start h-full space-y-6">
        
        <!-- Gambar kecil + teks -->
        <div class="flex flex-wrap gap-6 justify-center lg:justify-start">
          <div class="flex flex-col items-center space-y-2 max-w-[200px]">
            <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Pelatih" class="w-full h-28 object-cover rounded-md shadow-md">
            <p class="text-gray-600 text-sm text-center">Pendampingan langsung oleh pelatih</p>
          </div>
          <div class="flex flex-col items-center space-y-2 max-w-[200px]">
            <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Teknik" class="w-full h-28 object-cover rounded-md shadow-md">
            <p class="text-gray-600 text-sm text-center">Peningkatan teknik panahan</p>
          </div>
        </div>

        <!-- Highlight berita -->
        <div class="bg-white p-4 rounded-md shadow-md w-full max-w-md">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">Highlight Berita</h3>
          <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
            <li>Event panahan nasional diikuti oleh tim kami</li>
            <li>Pelatih kami meraih sertifikasi internasional</li>
            <li>Workshop teknik dasar gratis bulan ini</li>
          </ul>
        </div>

        <!-- Navigasi halaman -->
        <div class="flex justify-center items-center gap-3 w-full">
          <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-base rounded-md shadow-sm">‹</button>
          <button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md shadow-md">1</button>
          <button class="px-4 py-2 bg-gray-200 hover:bg-yellow-400 text-gray-700 rounded-md shadow-sm">2</button>
          <button class="px-4 py-2 bg-gray-200 hover:bg-yellow-400 text-gray-700 rounded-md shadow-sm">3</button>
          <span class="text-gray-500 font-medium">...</span>
          <button class="px-4 py-2 bg-gray-200 hover:bg-yellow-400 text-gray-700 rounded-md shadow-sm">5</button>
          <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-base rounded-md shadow-sm">›</button>
        </div>

      </div>
    </div>

  </div>
</section>
<!-- End Section 3 -->
