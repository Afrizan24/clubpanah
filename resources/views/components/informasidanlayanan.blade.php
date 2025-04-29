  {{-- Company Profile --}}
  <section class="py-12 px-4">
      <div class="text-center mb-8">
          <img src="{{ asset('gambar/logo anjas.png') }}" alt="Logo Archery"
              class="w-full max-w-xl mx-auto rounded-lg shadow-lg">
          <h2 class="text-4xl font-bold text-orange-500 mb-6">ARCHERY PROFILE</h2>
          <p class="max-w-4xl mx-auto text-gray-800">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam hic illo, esse aliquam cum quos aperiam?
              …
          </p>
      </div>
  </section>

  {{-- Layanan & Testimonial --}}
  <section class="bg-gray-300 py-12">
      <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6">

          {{-- Informasi Layanan --}}
          <div class="bg-white p-6 rounded-lg shadow-md md:w-1/3 w-full">
              <h3 class="text-2xl font-bold text-orange-500 mb-4">Informasi Layanan</h3>
              @foreach ($layanan as $item)
                  <div class="mb-6">
                      <p class="text-gray-700 mb-1">
                          <strong>Hari & Jam:</strong> {{ $item->hari_jam }}<br>
                          <strong>Biaya:</strong> {{ $item->biaya }}<br>
                          <strong>Lokasi:</strong> {{ $item->lokasi }}<br>
                          <strong>Kontak WA:</strong> {{ $item->kontak }}
                      </p>
                      @if ($item->gambar)
                          <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Layanan"
                              class="w-24 h-24 object-cover rounded mb-4">
                      @endif
                  </div>
              @endforeach
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
  @php
      $jsTestimonials = $testimonials
          ->map(
              fn($t) => [
                  'nama' => $t->nama,
                  'jabatan' => $t->jabatan,
                  'pesan' => $t->isi,
              ],
          )
          ->toArray();
  @endphp
  <script>
      const testimonials = @json($jsTestimonials);

      function showTestimonial(i) {
          document.getElementById('nama').textContent = testimonials[i].nama;
          document.getElementById('jabatan').textContent = testimonials[i].jabatan;
          document.getElementById('pesan').textContent = testimonials[i].pesan;

          testimonials.forEach((_, idx) => {
              document
                  .getElementById(`tab-${idx}`)
                  .classList.toggle('bg-gray-200', idx === i);
          });
      }

      document.addEventListener('DOMContentLoaded', () => showTestimonial(0));
  </script>
