@php
    $i = 0;
@endphp
<section class="bg-white mt-13 antialiased" x-data="{ filter: 'all' }">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
        <div class="max-w-screen-xl mx-auto">
            <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-12">GALERI BERSAMA ARCHERY SAMARINDA</h2>


            <!-- Galeri Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Item Galeri Besar -->
                @php
                    // Ambil galeri pertama yang bukan 'Video'
                    $firstGaleri = $galeris->firstWhere('kategori', '!==', 'Video');
                @endphp

                <!-- Tampilkan galeri pertama yang bukan video -->
                @if ($firstGaleri)
                    <div x-show="filter === 'all' || filter === '{{ $firstGaleri->kategori }}'"
                        class="col-span-2 row-span-2">
                        <img src="{{ Storage::url($firstGaleri->gambar) }}" alt="{{ $firstGaleri->kategori }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105">
                    </div>
                @endif

                <!-- Tampilkan sisa galeri yang bukan video, dan lewati galeri pertama yang sudah ditampilkan -->
                @foreach ($galeris->skip(1) as $galeri)
                    @if ($galeri->kategori !== 'Video' && $galeri->id !== $firstGaleri->id)
                        <!-- Cek ID agar galeri pertama tidak muncul lagi -->
                        <img x-show="filter === 'all' || filter === '{{ $galeri->kategori }}'"
                            src="{{ Storage::url($galeri->gambar) }}" alt="{{ $galeri->kategori }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105">
                    @endif
                @endforeach

            </div>

        </div>


        <!-- Filter Buttons -->
        <div class="flex justify-center gap-3 mb-8 mt-6 flex-wrap">
            <button @click="filter = 'all'" :class="{ 'bg-yellow-500 text-white': filter === 'all' }"
                class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Semua</button>
            <button @click="filter = 'Latihan'"
                :class="{ 'bg-yellow-500 text-white': filter === ['Latihan', 'latihan'] }"
                class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Latihan</button>
            <button @click="filter = 'Kompetisi'"
                :class="{ 'bg-yellow-500 text-white': filter === ['Kompetisi', 'kompetisi'] }"
                class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Kompetisi</button>
            <button @click="filter = 'Anggota'"
                :class="{ 'bg-yellow-500 text-white': filter === ['Anggota', 'anggota'] }"
                class="px-4 py-2 rounded border border-yellow-400 hover:bg-yellow-400 transition">Anggota</button>
        </div>
        <!--  -->


        <!-- Video Dokumentasi -->
        @foreach ($galeris as $galeri)
            @if ($galeri->kategori === 'Video')
                <div x-show="filter === 'all' || filter === '{{ $galeri->kategori }}'" class="col-span-2 row-span-2">
                    @if ($galeri->video_link)
                        <div class="video-container">
                            <iframe src="{{ $galeri->video_link }}" frameborder="0" allowfullscreen
                                class="w-full h-150"></iframe>
                        </div>
                    @else
                        <img src="{{ Storage::url($galeri->gambar) }}" alt="{{ $galeri->kategori }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-300 ease-in-out hover:scale-105">
                    @endif
                </div>
            @endif
        @endforeach
    </div>
</section>
