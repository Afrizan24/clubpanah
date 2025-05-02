<!-- Section 3 -->
<section class="bg-gray-300 mt-15">
    <div class="max-w-screen-xl mx-auto py-12 lg:py-20 px-4">
        
        <div id="beritaContainer" class="relative min-h-[950px]">
            @foreach ($berita as $index => $item)
                @php
                    $url = $item->video_url;
                    $embedUrl = '';
                    if (str_contains($url, 'youtube.com/watch')) {
                        parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
                        $videoId = $queryParams['v'] ?? '';
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                    } elseif (str_contains($url, 'youtu.be/')) {
                        $videoId = trim(parse_url($url, PHP_URL_PATH), '/');
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                    } elseif (str_contains($url, 'youtube.com/embed/')) {
                        $embedUrl = $url;
                    }

                    $highlightList = json_decode($item->highlights, true);
                @endphp

                <div class="berita-slide {{ $index > 0 ? 'hidden' : '' }}">
                    <div class="grid grid-cols-1 lg:grid-cols-12 items-center mb-16 gap-8">

                        <!-- Kiri: Video + Judul -->
                        <div class="lg:col-span-7 flex flex-col items-center">
                            @if ($embedUrl)
                                <div class="w-full max-w-md lg:max-w-lg relative" style="padding-top: 56.25%;">
                                    <iframe class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                                            src="{{ $embedUrl }}"
                                            title="Video Kegiatan"
                                            frameborder="0"
                                            allowfullscreen></iframe>
                                </div>
                            @else
                                <div class="w-full max-w-md lg:max-w-lg h-64 bg-gray-400 flex items-center justify-center rounded-xl shadow-lg">
                                    <span class="text-white">URL video tidak valid</span>
                                </div>
                            @endif

                            <h1 class="font-bold mt-4 text-2xl text-center text-gray-800">
                                {{ $item->title ?? 'Judul tidak tersedia' }}
                            </h1>
                        </div>

                        <!-- Kanan: Gambar + highlight -->
                        <div class="lg:col-span-5 flex flex-col items-start justify-start h-full space-y-6">
                            <div class="flex flex-wrap gap-6 justify-center lg:justify-start">
                                @for ($i = 1; $i <= 2; $i++)
                                    <div class="flex flex-col items-center space-y-2 w-[200px]">
                                        <div class="w-full h-32 overflow-hidden rounded-md shadow-md bg-gray-200">
                                            <img src="{{ $item->{'image' . $i} ? asset('storage/' . $item->{'image' . $i}) : asset('images/default.jpg') }}"
                                                alt="Gambar {{ $i }}"
                                                class="w-full h-full object-cover object-center">
                                        </div>
                                        <p class="text-gray-600 text-sm text-center">
                                            {{ $item->{'text' . $i} ?? "Deskripsi gambar $i belum tersedia" }}
                                        </p>
                                    </div>
                                @endfor
                            </div>

                            <div class="bg-white p-4 rounded-md shadow-md w-full max-w-md">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Highlight Berita</h3>
                                @if (!empty($highlightList) && is_array($highlightList))
                                    <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                                        @foreach ($highlightList as $highlight)
                                            <li>{{ $highlight }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm text-gray-700">Belum ada highlight berita.</p>
                                @endif
                            </div>

                            <div class="bg-white p-4 rounded-md shadow-md w-full max-w-md">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Event</h3>
                                @if ($events && $events->count() > 0)
                                    <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                                        @foreach ($events as $event)
                                            <li>
                                                @if($event->imageevent)
                                                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center rounded-lg overflow-hidden">
                                                        <img src="{{ asset('storage/'.$event->imageevent) }}" alt="Gambar Event" class="w-full h-full object-cover">
                                                    </div>
                                                @else
                                                    <p class="text-sm text-gray-600">Gambar belum tersedia.</p>
                                                @endif
                                                <p class="text-gray-600 text-sm">{{ $event->description ?? 'Deskripsi event belum tersedia' }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm text-gray-700">Belum ada Event.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Tombol Navigasi -->
            <div class="flex justify-center mt-4">
                <button id="prevBtn" class="px-4 py-2 bg-gray-600 text-white rounded-l-md hover:bg-gray-700 transition">← Sebelumnya</button>
                <span id="pageIndicator" class="px-4 py-2 bg-white text-gray-800 font-semibold rounded-md">1 / {{ count($berita) }}</span>
                <button id="nextBtn" class="px-4 py-2 bg-gray-600 text-white rounded-r-md hover:bg-gray-700 transition">Berita Terbaru →</button>
            </div>
        </div>

        <!-- Script Navigasi Slide -->
        <script>
            const slides = document.querySelectorAll('.berita-slide');
            const indicator = document.getElementById('pageIndicator');
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('hidden', i !== index);
                });
                indicator.innerText = `${index + 1} / ${slides.length}`;
            }

            document.getElementById('prevBtn').addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(currentIndex);
            });

            document.getElementById('nextBtn').addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            });
        </script>

    </div>
</section>
