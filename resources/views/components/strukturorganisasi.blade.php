<section class="bg-gradient-to-r mt-20 from-amber-300 to-yellow-500">
    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8">
  
      <!-- Judul -->
      <header class="text-center sm:text-left">
        <h2 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-2">STRUKTUR ORGANISASI</h2>
        <p class="text-gray-800 sm:text-lg max-w-2xl">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic, recusandae!
        </p>
      </header>
  
      <!-- Navigasi Internal -->
      <div class="flex gap-3 mb-8 mt-6 flex-wrap scroll-smooth">
        <a href="#pembina" class="px-4 py-2 rounded border border-yellow-400 text-black hover:bg-yellow-500 hover:text-white transition">Pembina</a>
        <a href="#ketua" class="px-4 py-2 rounded border border-yellow-400 text-black hover:bg-yellow-500 hover:text-white transition">Ketua</a>
        <a href="#sekretaris-bendahara" class="px-4 py-2 rounded border border-yellow-400 text-black hover:bg-yellow-500 hover:text-white transition">Sekretaris & Bendahara</a>
        <a href="#anggota" class="px-4 py-2 rounded border border-yellow-400 text-black hover:bg-yellow-500 hover:text-white transition">Anggota</a>
      </div>
  
      <!-- Pembina -->
      @if (isset($pembina))
        <div id="pembina" class="mt-10">
          <ul class="flex flex-wrap gap-6 justify-center">
            @foreach ($pembina as $item)
              <li>
                <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                  @if ($item->foto)
                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}" class="h-48 w-full object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300">
                  @endif
                  <div class="p-3 text-center">
                    <p class="text-gray-800 font-bold text-2xl">PEMBINA</p>
                    <p class="text-gray-800 text-sm">{{ $item->nama }}</p>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <!-- Ketua -->
      @if (isset($ketua) && $ketua->foto)
        <div id="ketua" class="mt-10">
          <ul class="flex justify-center">
            <li>
              <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                <img src="{{ Storage::url($ketua->foto) }}" alt="Ketua" class="h-48 w-full object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300">
                <div class="p-3 text-center">
                  <p class="text-gray-800 font-bold text-2xl">KETUA</p>
                  <p class="text-gray-800 text-sm">{{ $ketua->nama ?? 'Tidak ada' }}</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      @endif
  
      <!-- Sekretaris & Bendahara -->
      @if (isset($sekretaris) || isset($bendahara))
        <div id="sekretaris-bendahara" class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10 justify-items-center">
          @if (isset($sekretaris) && $sekretaris->foto)
            <div>
              <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[250px] mx-auto">
                <img src="{{ Storage::url($sekretaris->foto) }}" alt="Sekretaris" class="h-48 w-full object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300">
                <div class="p-3 text-center">
                  <p class="text-gray-800 font-bold text-2xl">SEKRETARIS</p>
                  <p class="text-gray-800 text-sm">{{ $sekretaris->nama ?? 'Tidak ada' }}</p>
                </div>
              </div>
            </div>
          @endif
  
          @if (isset($bendahara) && $bendahara->foto)
            <div>
              <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[250px] mx-auto">
                <img src="{{ Storage::url($bendahara->foto) }}" alt="Bendahara" class="h-48 w-full object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300">
                <div class="p-3 text-center">
                  <p class="text-gray-800 font-bold text-2xl">BENDAHARA</p>
                  <p class="text-gray-800 text-sm">{{ $bendahara->nama ?? 'Tidak ada' }}</p>
                </div>
              </div>
            </div>
          @endif
        </div>
      @endif
  
      <!-- Anggota -->
      <div id="anggota" class="mt-14 text-center">
        <h3 class="text-3xl font-extrabold text-black mb-6">ANGGOTA</h3>
        <ul class="flex flex-wrap gap-6 justify-center">
          @foreach ($anggota as $a)
            <li>
              <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                <img src="{{ Storage::url($a->foto) }}" alt="{{ $a->nama }}" class="h-48 w-full object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300">
                <div class="p-3 text-center">
                  <p class="text-gray-800 font-bold text-2xl">PEMANAH</p>
                  <p class="text-gray-800 text-sm">{{ $a->nama }}</p>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
  
    </div>
  </section>
  