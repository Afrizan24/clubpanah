<div class="informasi-layanan-component">
    {{-- Company Profile --}}
    <section class="py-12 px-4 bg-white">
        <div class="text-center mb-8 mt-16">
            {{-- Menampilkan Logo Profil --}}
            @if(isset($profile) && $profile->logo)
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Profil" class="w-full max-w-xl mx-auto rounded-lg shadow-lg">
            @else
                <div class="w-full max-w-xl mx-auto bg-gray-200 rounded-lg shadow-lg flex items-center justify-center" style="height: 200px;">
                    <span class="text-gray-500">Logo belum diupload</span>
                </div>
            @endif

            {{-- Menampilkan Deskripsi Profil --}}
            <h2 class="text-4xl font-bold text-orange-500 mb-6 mt-8">Deskripsi Profil</h2>
            <p class="max-w-4xl mx-auto text-gray-800 text-lg">
                {{ $profile->description ?? 'Deskripsi Club tidak tersedia' }}
            </p>
        </div>
    </section>

    {{-- Layanan & Testimonial --}}
<section class="bg-gray-100 py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-orange-500 mb-8">LAYANAN & TESTIMONIAL</h2>
        
        {{-- Informasi & Layanan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            {{-- Informasi Club --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-bold text-orange-500 mb-4">Informasi Club</h3>
                @forelse($layanan->take(2) as $item)
                    <div class="mb-6 border-b pb-4 last:border-b-0">
                        <div class="mt-3 grid grid-cols-2 gap-2 text-sm">
                            <div>
                                <p class="font-medium">Jadwal:</p>
                                <span>{{ $item->hari_jam }}</span>
                            </div>

                            <div>
                                <p class="font-medium">Biaya:</p>
                                <span>{{ $item->biaya ? 'Rp ' . number_format($item->biaya, 0, ',', '.') : 'Gratis' }}</span>
                            </div>

                            <div>
                                <p class="font-medium">Lokasi:</p>
                                <span>{{ $item->lokasi }}</span>
                            </div>

                            <div>
                                <p class="font-medium">Kontak:</p>
                                <span>{{ $item->kontak }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <p>Belum ada informasi dasar</p>
                    </div>
                @endforelse
            </div>

            {{-- Layanan Club --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-bold text-orange-500 mb-4">Layanan Club</h3>
                @forelse($layanan->take(2) as $item)
                    <div class="mb-6 border-b pb-4 last:border-b-0">
                        <h3 class="font-semibold text-xl text-gray-800">{{ $item->judul }}</h3>
                        <p class="text-gray-600 mt-2">{{ $item->deskripsi }}</p>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <p>Belum ada layanan Club</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Testimonial (Full Width) --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-orange-500 mb-4">Testimonial</h3>
            <div class="space-y-4" id="testimonial-container">
                @forelse($testimonials as $testimonial)
                    <div class="border rounded-lg p-4 hover:shadow-md transition duration-200 testimonial-item">
                        <div class="flex items-start gap-4">
                            @if($testimonial->foto)
                                <img src="{{ asset('storage/' . $testimonial->foto) }}" 
                                     class="w-12 h-12 rounded-full object-cover" 
                                     alt="{{ $testimonial->nama }}">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            @endif
                            
                            <div class="flex-1">
                                <h4 class="font-semibold text-lg">{{ $testimonial->nama }}</h4>
                                @if($testimonial->jabatan)
                                    <p class="text-sm text-gray-500">{{ $testimonial->jabatan }}</p>
                                @endif
                                <p class="mt-2 text-gray-700 italic">"{{ $testimonial->isi }}"</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <p>Belum ada testimonial</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const testimonialItems = document.querySelectorAll('.testimonial-item');
        if (testimonialItems.length > 0) {
            testimonialItems[0].classList.add('bg-gray-100');
        }
    });
</script>
