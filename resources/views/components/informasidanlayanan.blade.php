{{-- Company Profile --}}
<section class="py-12 px-4">
    <div class="text-center mb-8">
        <img src="{{ asset('gambar/logo anjas.png') }}" alt="Logo Archery"
            class="w-full max-w-xl mx-auto rounded-lg shadow-lg">
        <h2 class="text-4xl font-bold text-orange-500 mb-6 mt-8">ARCHERY PROFILE</h2>
        <p class="max-w-4xl mx-auto text-gray-800">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam hic illo, esse aliquam cum quos aperiam? …
        </p>
    </div>
</section>

{{-- Layanan & Testimonial --}}
<section class="bg-gray-300 py-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6">

        {{-- Informasi Layanan --}}
        <div class="bg-white p-6 rounded-lg shadow-md md:w-1/3 w-full">
            <h3 class="text-2xl font-bold text-orange-500 mb-4">Informasi Layanan</h3>
            
            @if($layanan->isEmpty())
                {{-- Form input layanan hanya muncul jika belum ada layanan yang terdaftar --}}
                <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium">Judul Layanan</label>
                        <input type="text" name="judul" class="w-full p-3 border rounded-lg" placeholder="Contoh: Latihan Rutin Mingguan">
                    </div>
                    <!-- Form lainnya untuk layanan -->
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                        Simpan Layanan
                    </button>
                </form>
            @else
                <p class="text-gray-500">Layanan sudah ditambahkan.</p>
            @endif
        </div>

        {{-- Detail Layanan --}}
        <div class="bg-white p-6 rounded-lg shadow-md md:w-1/3 w-full">
            <h3 class="text-2xl font-bold text-orange-500 mb-4">Layanan</h3>
            @foreach ($layanan as $item)
                <div class="mb-6">
                    <h4 class="font-semibold text-lg">{{ $item->judul }}</h4>
                    <p class="text-gray-700">{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>

        {{-- Testimonial --}}
        <div class="bg-white p-6 rounded-lg shadow-md md:w-1/3 w-full">
            <h3 class="text-2xl font-bold text-orange-500 mb-4">Testimonial</h3>

            {{-- Form input testimonial, hanya bisa 3 --}}
            @if($testimonials->count() < 3)
                <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Form lainnya untuk testimonial -->
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                        Simpan Testimonial
                    </button>
                </form>
            @else
                <p class="text-gray-500">Anda sudah menambahkan 3 testimonial.</p>
            @endif

            {{-- Tab list --}}
            <div class="space-y-3">
                @foreach ($testimonials as $i => $t)
                    <div id="tab-{{ $i }}" onclick="showTestimonial({{ $i }})"
                        class="flex items-center gap-3 p-2 rounded-lg cursor-pointer hover:bg-gray-100 {{ $i === 0 ? 'bg-gray-200' : '' }}">
                        @if ($t->foto)
                            <img src="{{ asset('storage/' . $t->foto) }}" class="w-12 h-12 rounded-full object-cover"
                                alt="{{ $t->nama }}">
                        @else
                            <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                        @endif
                        <div>
                            <p class="font-semibold">{{ $t->nama }}</p>
                            <p class="text-sm text-gray-500">{{ $t->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Konten testimonial aktif --}}
            <div id="testimonial-content" class="mt-6">
                <h4 id="nama" class="text-lg font-semibold"></h4>
                <p id="jabatan" class="text-sm text-gray-500 mb-2"></p>
                <p id="pesan" class="text-base text-gray-700"></p>
            </div>
        </div>

    </div>
</section>

{{-- Script Dinamis --}}
<script>
    const testimonials = @json($testimonials);

    function showTestimonial(i) {
        document.getElementById('nama').textContent = testimonials[i].nama;
        document.getElementById('jabatan').textContent = testimonials[i].jabatan;
        document.getElementById('pesan').textContent = testimonials[i].isi;

        testimonials.forEach((_, idx) => {
            document.getElementById(`tab-${idx}`).classList.toggle('bg-gray-200', idx === i);
        });
    }

    document.addEventListener('DOMContentLoaded', () => showTestimonial(0));
</script>
