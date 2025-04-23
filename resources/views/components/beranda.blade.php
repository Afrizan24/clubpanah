<!-- SECTION 1 -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <!-- Title -->
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none  text-yellow-500 md:text-5xl xl:text-6xl">
                GOLD ARCHERY SAMARINDA
            </h1>
          
            <!-- Subtitle -->
            <p class="max-w-2xl mb-6 font-light text-gray-600 lg:mb-8 md:text-lg lg:text-xl">
                Bergabunglah dengan komunitas panahan terbaik di Samarinda. Kami menawarkan pelatihan, acara komunitas, dan perlengkapan berkualitas untuk semua kalangan!
            </p>
            <!-- Call to Action Button -->
            <a href="/about" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-white rounded-lg bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300">
                Pelajari Lebih Lanjut
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
            <!-- Contact Button -->
            <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                Hubungi Kami
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex items-center justify-center">
            <!-- Image -->
            <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg" src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="{{ asset('storage/gambar/archer.jpeg') }}" alt="office content 2">
        </div>
        </div>                
    </div>
</section>
<!-- end Section 1 -->


<!-- Section 2 -->
<section class="bg-gradient-to-r from-amber-300 to-yellow-500">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8">
    <header class="text-center sm:text-left">
      <h2 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-2">GALERI</h2>
      <p class="text-gray-800 sm:text-lg max-w-2xl">
        Momen-momen terbaik dari berbagai aktivitas, program latihan, serta acara komunitas yang kami selenggarakan. Kami bangga membagikan semangat dan kebersamaan yang terjalin di setiap kegiatan.
      </p>
    </header>
    <ul class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <li>
        <a href="#" class="group block overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white/30">
          <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="" class="h-[250px] sm:h-[300px] w-full object-cover rounded-t-xl transition-transform duration-300 group-hover:scale-105" />
          <div class="p-4">
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed group-hover:text-black transition">
              Lihat keseruan dan semangat kami dalam berbagai kegiatan! Mulai dari latihan rutin, kompetisi, hingga acara kebersamaan – semuanya terekam di sini.
            </p>
          </div>
        </a>
      </li>
      <li>
        <a href="#" class="group block overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white/30">
          <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="" class="h-[250px] sm:h-[300px] w-full object-cover rounded-t-xl transition-transform duration-300 group-hover:scale-105" />
          <div class="p-4">
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed group-hover:text-black transition">
              Lihat keseruan dan semangat kami dalam berbagai kegiatan! Mulai dari latihan rutin, kompetisi, hingga acara kebersamaan – semuanya terekam di sini.
            </p>
          </div>
        </a>
      </li>
      <li>
        <a href="#" class="group block overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white/30">
          <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="" class="h-[250px] sm:h-[300px] w-full object-cover rounded-t-xl transition-transform duration-300 group-hover:scale-105" />
          <div class="p-4">
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed group-hover:text-black transition">
              Lihat keseruan dan semangat kami dalam berbagai kegiatan! Mulai dari latihan rutin, kompetisi, hingga acara kebersamaan – semuanya terekam di sini.
            </p>
          </div>
        </a>
      </li>
      <li>
        <a href="#" class="group block overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white/30">
          <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="" class="h-[250px] sm:h-[300px] w-full object-cover rounded-t-xl transition-transform duration-300 group-hover:scale-105" />
          <div class="p-4">
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed group-hover:text-black transition">
              Lihat keseruan dan semangat kami dalam berbagai kegiatan! Mulai dari latihan rutin, kompetisi, hingga acara kebersamaan – semuanya terekam di sini.
            </p>
          </div>
        </a>
      </li>
    </ul>
    <!-- Tombol untuk lihat ke semua galeri-->
    <div class="mt-10 text-center">
      <a href="/galeri" class="relative inline-block group  text-3xl font-extrabold text-black px-2">
        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
        <span class="transition-colors duration-300 group-hover:text-black">SEE MORE</span>
      </a>
    </div>
  </div>
</section>
<!-- end Section 2 -->



<!-- Section 3 -->
<section class="bg-white">
  <div class="max-w-screen-xl mx-auto px-4 py-12 lg:py-20">
    
    <!-- Section Title -->
    <h2 class="text-yellow-500 text-4xl md:text-5xl xl:text-6xl font-extrabold sm:text-4xl mb-12 text-center lg:text-left">ABOUT US</h2>

    <!-- Row 1: Teks kiri, gambar kanan -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-16">
      <div class="lg:col-span-7 order-2 lg:order-1">
        <h3 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-4">Pelatih Yang Terarah</h3>
        <p class="text-gray-600 text-lg md:text-xl font-light">
          Klub panahan memberikan bimbingan dari pelatih berpengalaman. Ini penting banget, terutama buat pemula, supaya teknik dasarnya benar sejak awal dan bisa berkembang dengan aman.
        </p>
      </div>
      <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
        <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Gold Archery Samarinda" class="rounded-xl shadow-lg max-w-full h-auto">
      </div>
    </div>

    <!-- Row 2: Gambar kiri, teks kanan -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-16">
      <div class="lg:col-span-5 order-1 flex justify-center">
        <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Program Latihan" class="rounded-xl shadow-lg max-w-full h-auto">
      </div>
      <div class="lg:col-span-7 order-2">
        <h3 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-4">Keselamatan</h3>
        <p class="text-gray-600 text-lg md:text-xl font-light">
          Di klub, ada aturan dan prosedur keselamatan yang ketat. Ini penting karena panahan melibatkan alat yang bisa berbahaya kalau tidak digunakan dengan benar.
        </p>
      </div>
    </div>

    <!-- Row 3: Teks kiri, gambar kanan -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7 order-2 lg:order-1">
        <h3 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-4">Lingkungan Mendukung</h3>
        <p class="text-gray-600 text-lg md:text-xl font-light">
          Latihan bareng teman-teman sesama pemanah bisa memotivasi dan bikin latihan jadi lebih seru. Kamu juga bisa saling belajar satu sama lain.
        </p>
      </div>
      <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
        <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Gold Archery Samarinda" class="rounded-xl shadow-lg max-w-full h-auto">
      </div>
    </div>

  </div>
</section>
<!-- end Section 3 -->

<!-- Section 4 -->
<section class="bg-gray-800 dark:bg-gray-800 py-12">
  <div class="container mx-auto px-4 max-w-screen-xl">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

      <!-- Form Kontak -->
      <div>
        <h2 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-4xl text-center lg:text-left">
          Contact Person
        </h2>
        <p class="mb-8 lg:mb-12 font-light text-center lg:text-left text-gray-500 dark:text-gray-400 sm:text-xl">
          Kami siap membantu Anda. Kirim pesan atau pertanyaan Anda melalui formulir berikut.
        </p>
        <form action="#" class="space-y-8">
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Anda</label>
            <input type="text" id="name" placeholder="Nama Lengkap" required
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                     focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Anda</label>
            <input type="email" id="email" placeholder="email@example.com" required
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                     focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
          </div>
          <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pesan Anda</label>
            <textarea id="message" rows="6" placeholder="Tulis pesan Anda di sini..." required
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                     focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
          </div>
          <button type="submit"
            class="py-3 px-5 text-sm font-medium text-white bg-blue-600 rounded-lg 
                   sm:w-fit hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 
                   dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            Kirim Pesan
          </button>
        </form>
      </div>

      <!-- Info Kontak -->
      <div class="flex flex-col justify-center">
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 shadow-inner">
          <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
            Club Panahan Berkuda "Horsebow"
          </h3>

          <ul class="space-y-2 text-gray-700 dark:text-gray-300 text-lg">
            <li>🗺️ Jl. Belatuk</li>
            <li>📌 Lebih rame kalo datang hari Minggu pagi</li>
            <li>ℹ️ More Info: DM or WA <a href="https://wa.me/628125372066" class="text-blue-600 underline">+62 812-5372-066 (Purwanto)</a> - Ketua</li>
            <li>
              📌 <a href="https://goo.gl/maps/fWRcnzehjpSEwkwAA" target="_blank" class="text-blue-600 underline">
                Lokasi Google Maps
              </a>
            </li>
          </ul>

          <!-- Google Maps Embed -->
          <div class="mt-6">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31654.09343102626!2d110.3749391!3d-7.7955798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58f492a63f2d%3A0x6c3c690a59d89ae1!2sJl.%20Belatuk!5e0!3m2!1sid!2sid!4v1611111111111!5m2!1sid!2sid" 
              width="100%" 
              height="300" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- End Section 4 -->

