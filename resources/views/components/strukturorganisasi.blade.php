<!-- Section 2 -->
<section class="bg-gradient-to-r from-amber-300 to-yellow-500">
    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8">
        <header class="text-center sm:text-left">
            <h2 class="text-3xl font-extrabold text-gray-800 sm:text-4xl mb-2">STRUKTUR ORGANISASI</h2>
            <p class="text-gray-800 sm:text-lg max-w-2xl">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic, recusandae!
            </p>
        </header>
        <div class="flex  gap-3 mb-8 mt-6 flex-wrap scroll-smooth">
            <a href="#ketua"
                class="px-4 py-2 rounded border border-yellow-400 text-black  hover:bg-yellow-500 hover:text-white transition">
                Ketua dan Sekretaris Bendahara
            </a>
            <a href="#anggota"
                class="px-4 py-2 rounded border border-yellow-400 text-black  hover:bg-yellow-500 hover:text-white transition">
                Anggota
            </a>
        </div>



        <div class="flex justify-center mt-10">

            {{-- <!-- Pembina Card -->
        <ul class="flex flex-wrap gap-6 justify-center">
            <li>
            <a href="#" class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Foto Profil"
                    class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                <div class="p-3">
                    <p class="text-gray-800 font-bold text-2xl leading-snug text-center">PEMBINA</p>
                    <p class="text-gray-800 text-sm leading-snug text-center">AFRIZAN AH</p>
                </div>
                </a>
            </li>
         </ul>
        </div> --}}
            <!-- Pembina Card -->
            <ul class="flex flex-wrap gap-6 justify-center">
                @if (isset($pembina))
                    <!-- Data ada -->
                    @foreach ($pembina as $item)
                        <!-- Kode Anda -->
                        <li>
                            <a href="#"
                                class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }} - Pembina"
                                    class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                                <div class="p-3">
                                    <p class="text-gray-800 font-bold text-2xl leading-snug text-center">PEMBINA</p>
                                    <p class="text-gray-800 text-sm leading-snug text-center">{{ $item->nama }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @else
                    <p>Variable $pembina tidak tersedia di view</p>
                @endif
        </div>
        <!-- End Pembina Card -->



        <!-- Ketua Card -->

        <div id="ketua" class="flex justify-center mt-10">
            <ul class="flex flex-wrap gap-6 justify-center">
                <li>
                    <a href="#"
                        class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                        <img src="{{ Storage::url($ketua->foto) }}" alt="Foto Profil"
                            class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                        <div class="p-3">
                            <p class="text-gray-800 font-bold text-2xl leading-snug text-center">KETUA</p>
                            <p class="text-gray-800 text-sm leading-snug text-center">{{ $ketua->nama ?? 'tidak ada' }}
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <!-- End Ketua Card -->



        <!-- Baris Sekretaris & Bendahara -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10">
            <!-- Sekretaris Section -->
            <div>
                <!-- Sekretaris Card -->
                <div class="mb-6">
                    <a href="#"
                        class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[250px] mx-auto">
                        <img src="{{ Storage::url($sekretaris->foto) }}" alt="Foto Profil"
                            class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                        <div class="p-3">
                            <p class="text-gray-800 font-bold text-2xl text-center">SEKRETARIS</p>
                            <p class="text-gray-800 text-sm text-center">{{ $sekretaris->nama }}</p>
                        </div>
                    </a>
                </div>
                <!-- Divisi Sekretaris -->
                <ul class="flex justify-center flex-wrap gap-6">
                    <!-- Divisi A bendahara -->
                    @if ($divisi->isEmpty())
                        <p>No divisi data available.</p>
                    @else
                        <!-- Divisi Bendahara -->
                        <ul class="flex justify-center flex-wrap gap-6">
                            <!-- Divisi A bendahara -->
                            @foreach ($divisi as $item)
                                @if (str_contains($item->jabatan, 'Sekretaris Divisi A'))
                                    <li>
                                        <a href="#"
                                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                                            <img src="{{ Storage::url($item->foto) }}" alt="Foto Profil"
                                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                                            <div class="p-3">
                                                <p class="text-gray-800 font-bold text-xl text-center">
                                                    {{ $item->jabatan }}</p>
                                                <p class="text-gray-800 text-sm text-center">{{ $item->nama }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            @foreach ($divisi as $item)
                                @if (str_contains($item->jabatan, 'Sekretaris Divisi B'))
                                    <li>
                                        <a href="#"
                                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                                            <img src="{{ Storage::url($item->foto) }}" alt="Foto Profil"
                                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                                            <div class="p-3">
                                                <p class="text-gray-800 font-bold text-xl text-center">
                                                    {{ $item->jabatan }}</p>
                                                <p class="text-gray-800 text-sm text-center">{{ $item->nama }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif

                </ul>
            </div>

            <!-- Bendahara Section -->
            <div>
                <!-- Bendahara Card -->
                <div class="mb-6">
                    <a href="#"
                        class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[250px] mx-auto">
                        <img src="{{ Storage::url($bendahara->foto) }}" alt="Foto Profil"
                            class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                        <div class="p-3">
                            <p class="text-gray-800 font-bold text-2xl text-center">BENDAHARA</p>
                            <p class="text-gray-800 text-sm text-center">{{ $bendahara->nama }}</p>
                        </div>
                    </a>
                </div>
                <!-- Divisi Bendahara -->
                <ul class="flex justify-center flex-wrap gap-6">
                    <!-- Divisi A bendahara -->
                    @if ($divisi->isEmpty())
                        <p>No divisi data available.</p>
                    @else
                        <!-- Divisi Bendahara -->
                        <ul class="flex justify-center flex-wrap gap-6">
                            <!-- Divisi A bendahara -->
                            @foreach ($divisi as $item)
                                @if (str_contains($item->jabatan, 'Bendahara Divisi A'))
                                    <li>
                                        <a href="#"
                                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                                            <img src="{{ Storage::url($item->foto) }}" alt="Foto Profil"
                                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                                            <div class="p-3">
                                                <p class="text-gray-800 font-bold text-xl text-center">
                                                    {{ $item->jabatan }}</p>
                                                <p class="text-gray-800 text-sm text-center">{{ $item->nama }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            @foreach ($divisi as $item)
                                @if (str_contains($item->jabatan, 'Bendahara Divisi B'))
                                    <li>
                                        <a href="#"
                                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                                            <img src="{{ Storage::url($item->foto) }}" alt="Foto Profil"
                                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                                            <div class="p-3">
                                                <p class="text-gray-800 font-bold text-xl text-center">
                                                    {{ $item->jabatan }}</p>
                                                <p class="text-gray-800 text-sm text-center">{{ $item->nama }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif

                </ul>
            </div>
        </div>

        <!-- END  -->





        <div id="anggota" class="mt-10  text-center">
            <a href="/pemanah" class="relative inline-block group  text-3xl font-extrabold text-black px-2">
                <span
                    class="absolute left-0 bottom-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
                <span class="transition-colors duration-300 group-hover:text-black">ANGGOTA</span>
            </a>
        </div>

        <div class="flex justify-center mt-10">


            <ul class="flex flex-wrap gap-6 justify-center">
                @foreach ($anggota as $a)
                    <li>
                        <a href="#"
                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                            <img src="{{ Storage::url($a->foto) }}" alt="Foto Profil"
                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                            <div class="p-3">
                                <p class="text-gray-800 font-bold text-2xl leading-snug text-center">PEMAIN</p>
                                <p class="text-gray-800 text-sm leading-snug text-center">{{ $a->nama }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>




        </div>

    </div>

</section>
<!-- end Section 2 -->
