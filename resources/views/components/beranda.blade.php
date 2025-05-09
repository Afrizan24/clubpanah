@php
    $hero1 = $fotos['hero1']->first();
    $hero2 = $fotos['hero2']->first();
    $about1 = optional($fotos['about1']->first());
    $about2 = optional($fotos['about2']->first());
    $about3 = optional($fotos['about3']->first());
@endphp

<!-- SECTION 1 -->
<section class="bg-white mt-20 scroll-smooth">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div data-aos="fade-up" class="mr-auto place-self-center lg:col-span-7">
            <!-- Title -->
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none  text-yellow-500 md:text-5xl xl:text-6xl">
                {{ $beranda->judul ?? 'GOLD ARCHERY SAMARINDA' }}
            </h1>

            <!-- Subtitle -->
            <p class="max-w-2xl mb-6 font-light text-gray-600 lg:mb-8 md:text-lg lg:text-xl">
                {{ $beranda->deskripsi ??
                    'Bergabunglah dengan komunitas panahan terbaik di Samarinda. Kami menawarkan pelatihan, acara komunitas, dan perlengkapan berkualitas untuk semua kalangan!' }}
            </p>
            <!-- Call to Action Button -->
            <a href="#about"
                class=" inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-white rounded-lg bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300">
                Pelajari Lebih Lanjut
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <!-- Contact Button -->
            <a href="#contact"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                Hubungi Kami
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex items-center justify-center">
            <!-- Image -->
            <div class="grid grid-cols-2 gap-4 mt-8">
                @if ($hero1 && $hero1->gambar)
                    <img class="w-full rounded-lg" src="{{ Storage::url($hero1->gambar) }}" alt="office content 1">
                @endif

                @if ($hero2 && $hero2->gambar)
                    <img class="mt-4 w-full lg:mt-10 rounded-lg" src="{{ Storage::url($hero2->gambar) }}"
                        alt="office content 2">
                @endif

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
                Momen-momen terbaik dari berbagai aktivitas, program latihan, serta acara komunitas yang kami
                selenggarakan. Kami bangga membagikan semangat dan kebersamaan yang terjalin di setiap kegiatan.
            </p>
        </header>
        <ul class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @for ($i = 1; $i <= 4; $i++)
                @if (isset($fotos['galeri' . $i]) && $fotos['galeri' . $i]->isNotEmpty())
                    <li>
                        <div
                            class="group block overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white/30">
                            <div class="relative">
                                <img src="{{ Storage::url($fotos['galeri' . $i]->first()->gambar) }}"
                                    alt="Galeri {{ $i }}"
                                    class="h-[250px] sm:h-[300px] w-full object-cover rounded-t-xl transition-transform duration-300 group-hover:scale-105" />
                            </div>
                            <div class="p-4">
                                <p
                                    class="text-gray-700 text-sm sm:text-base leading-relaxed group-hover:text-black transition">
                                    {{ $fotos['galeri' . $i]->first()->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endif
            @endfor
        </ul>

        <!-- Tombol untuk lihat ke semua galeri-->
        <div class="mt-10 text-center">
            <a href="/galeri" class="relative inline-block group  text-3xl font-extrabold text-black px-2">
                <span
                    class="absolute left-0 bottom-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
                <span class="transition-colors duration-300 group-hover:text-black">SEE MORE</span>
            </a>
        </div>
    </div>
</section>
<!-- end Section 2 -->



<!-- Section 3 -->
<section id="about" class="bg-white">
    <div class="max-w-screen-xl mx-auto px-4 py-12 lg:py-20">

        <!-- Section Title -->
        <h2
            class="text-yellow-500 text-4xl md:text-5xl xl:text-6xl font-extrabold sm:text-4xl mb-12 text-center lg:text-left">
            ABOUT US</h2>

        <!-- Row 1: Teks kiri, gambar kanan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-16">
            <div class="lg:col-span-7 order-2 lg:order-1">
                <h3 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-4">
                    {{ $fotos['about1']->first()->judul ?? 'Pelatih Yang Terarah' }}</h3>
                <p class="text-gray-600 text-lg md:text-xl font-light">
                    {{ $fotos['about1']->first()->deskripsi ??
                        'Klub panahan memberikan bimbingan dari pelatih berpengalaman. Ini penting banget, terutama buat pemula, supaya teknik dasarnya benar sejak awal dan bisa berkembang dengan aman.' }}
                </p>
            </div>
            <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
                <img src="{{ Storage::url($about1->gambar) }}" alt=""
                    class="rounded-xl shadow-lg max-w-full h-auto">
            </div>
        </div>

        <!-- Row 2: Gambar kiri, teks kanan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-16">
            <div class="lg:col-span-5 order-1 flex justify-center">
                <img src="{{ Storage::url($about2->gambar) }}" alt=""
                    class="rounded-xl shadow-lg max-w-full h-auto">
            </div>
            <div class="lg:col-span-7 order-2">
                <h3 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-4">
                    {{ $fotos['about2']->first()->judul ?? 'Keselamatan' }}</h3>
                <p class="text-gray-600 text-lg md:text-xl font-light">
                    {{ $fotos['about2']->first()->deskripsi ??
                        'Di klub, ada aturan dan prosedur keselamatan yang ketat. Ini penting karena panahan melibatkan alat yang bisa berbahaya kalau tidak digunakan dengan benar.' }}
                </p>
            </div>
        </div>

        <!-- Row 3: Teks kiri, gambar kanan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 order-2 lg:order-1">
                <h3 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-4">
                    {{ $fotos['about3']->first()->judul ?? 'Lingkungan Mendukung' }}</h3>
                <p class="text-gray-600 text-lg md:text-xl font-light">
                    {{ $fotos['about3']->first()->deskripsi ??
                        'Latihan bareng teman-teman sesama pemanah bisa memotivasi dan bikin latihan jadi lebih seru. Kamu juga bisa saling belajar satu sama lain.    ' }}
                </p>
            </div>
            <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
                <img src="{{ Storage::url($about3->gambar) }}" alt=""
                    class="rounded-xl shadow-lg max-w-full h-auto">
            </div>
        </div>

    </div>
</section>
<!-- end Section 3 -->

<!-- Section 4: Kontak -->
<section id="contact" class="bg-gray-900 py-16">
    <div class="container mx-auto px-4 max-w-screen-xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-10">

            <!-- Kolom Kiri: Info Kontak -->
            <div class="space-y-6 flex flex-col justify-center">
                <div class="bg-gray-100 dark:bg-gray-700 rounded-xl p-8 shadow-inner">
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">
                        Club Panahan Berkuda <span class="text-indigo-600">"Horsebow"</span>
                    </h3>

                    <ul class="space-y-4 text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                        <li>
                            🗺️ <strong>Alamat:</strong><br>
                            {{ $beranda->alamat ?? 'Alamat belum tersedia' }}
                        </li>
                        <li>
                            📌 <strong>Catatan:</strong><br>
                            Lebih rame kalau datang hari <span class="font-semibold text-yellow-500">Minggu pagi</span>
                        </li>
                        <li>
                            ℹ️ <strong>More Info:</strong><br>
                            DM atau WA
                            <a href="https://wa.me/{{ $beranda->whatsapp ?? '' }}"
                                class="text-blue-500 hover:text-blue-700 font-semibold underline transition">
                                +{{ $beranda->whatsapp ?? 'No WA' }}
                            </a> - Ketua
                        </li>
                        <li>
                            📍 <strong>Maps:</strong><br>
                            <a href="https://goo.gl/maps/fWRcnzehjpSEwkwAA" target="_blank"
                                class="text-blue-500 hover:text-blue-700 font-semibold underline transition">
                                Lihat Lokasi di Google Maps
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @php
                function convertGoogleMapsToEmbed($mapUrl)
                {
                    if (empty($mapUrl) || !filter_var($mapUrl, FILTER_VALIDATE_URL)) {
                        return '';
                    }

                    if (strpos($mapUrl, 'google.com/maps') === false) {
                        return '';
                    }

                    // Koordinat: @-0.4758743,117.1637308,17z
                    if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $mapUrl, $matches)) {
                        $lat = $matches[1];
                        $lng = $matches[2];
                        return "https://www.google.com/maps?q={$lat},{$lng}&output=embed";
                    }

                    // Nama tempat: /place/Gold+Archery/
                    if (preg_match('/place\/([^\/]+)/', $mapUrl, $matches)) {
                        $place = urlencode(str_replace('+', ' ', $matches[1]));
                        return "https://www.google.com/maps?q={$place}&output=embed";
                    }

                    // Fallback
                    return 'https://www.google.com/maps?q=' . urlencode($mapUrl) . '&output=embed';
                }
            @endphp
            @isset($beranda->google_maps)
                @php
                    $embedUrl = convertGoogleMapsToEmbed($beranda->google_maps);
                @endphp
            @endisset

            <!-- Kolom Kanan: Google Maps -->
            <div class="flex items-center justify-center">
                <div
                    class="w-full h-full rounded-xl overflow-hidden shadow-lg border border-gray-300 dark:border-gray-600">
                    @if (!empty($embedUrl))
                        <iframe src="{{ $embedUrl }}"; width="100%" height="400" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <p>Peta tidak tersedia</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>





@if ($events)
    <div id="popupEvent"
        class="fixed inset-0 bg-black/30 backdrop-blur-sm flex justify-center items-center z-50 opacity-0 pointer-events-none transition-opacity duration-500">
        <div
            class="bg-white rounded-xl p-6 max-w-sm w-full relative shadow-2xl scale-95 transition-transform duration-500">
            <button onclick="hidePopup()"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl font-bold">&times;</button>

            <h2 class="text-lg font-semibold mb-3 text-center text-gray-800">📢 Ada Event Nih</h2>

            <div class="mb-3">
                @if ($events->imageevent)
                    <img src="{{ asset('storage/' . $events->imageevent) }}" alt="Event Image"
                        class="w-full h-40 object-cover rounded-md shadow">
                @else
                    <p class="text-gray-500">Gambar event tidak tersedia.</p>
                @endif
            </div>

            <div class="text-sm text-gray-700 whitespace-pre-line">
                {{ $events->description ?? 'Deskripsi event belum tersedia' }}
            </div>
        </div>
    </div>

    <script>
        function hidePopup() {
            const popup = document.getElementById('popupEvent');
            if (popup) {
                popup.classList.add('opacity-0', 'pointer-events-none');
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('popupEvent');
            if (popup) {
                // Tampilkan dulu popup (kalau kamu belum munculkan secara otomatis, tambahkan di sini)
                popup.classList.remove('opacity-0', 'pointer-events-none');

                // Setelah 2 detik, popup disembunyikan
                setTimeout(() => {
                    hidePopup();
                }, 2000);
            }
        });
    </script>


@endif

<!-- End Section 4 -->
