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
            src="{{ str_replace('watch?v=', 'embed/', $berita->video_url) }}"
            title="Video Kegiatan"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
          </iframe>
        </div>
        <h1 class="font-bold mt-4 text-2xl text-center text-gray-800">{{ $berita->title }}</h1>
      </div>

      <!-- Gambar pendukung + highlight berita + navigasi -->
      <div class="lg:col-span-5 order-1 lg:order-2 flex flex-col items-start justify-start h-full space-y-6">

        <!-- Gambar kecil + teks -->
        <div class="flex flex-wrap gap-6 justify-center lg:justify-start">
          <div class="flex flex-col items-center space-y-2 max-w-[200px]">
            <img src="{{ asset('storage/' . $berita->image1) }}" alt="Gambar 1" class="w-full h-28 object-cover rounded-md shadow-md">
            <p class="text-gray-600 text-sm text-center">{{ $berita->text1 }}</p>
          </div>
          <div class="flex flex-col items-center space-y-2 max-w-[200px]">
            <img src="{{ asset('storage/' . $berita->image2) }}" alt="Gambar 2" class="w-full h-28 object-cover rounded-md shadow-md">
            <p class="text-gray-600 text-sm text-center">{{ $berita->text2 }}</p>
          </div>
        </div>

        <!-- Highlight berita -->
        <div class="bg-white p-4 rounded-md shadow-md w-full max-w-md">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">Highlight Berita</h3>
          <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
            @foreach (explode(',', $berita->highlights) as $highlight)
              <li>{{ trim($highlight) }}</li>
            @endforeach
          </ul>
        </div>

      </div>
    </div>

  </div>
</section>
<!-- End Section 3 -->
