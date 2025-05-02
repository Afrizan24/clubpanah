<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Data Anggota Pemanah</h2>

<!-- Alpine.js dan Chart.js -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div x-data="{
    showModal: false,
    showEditModal: false,
    skillData: {
        accuracy: 88,
        power: 82,
        focus: 91,
        technique: 15,
        strength: 90,
        endurance: 43,
        stamina: 80
    },
    chartInstance: null,
    updateChart() {
        const ctx = document.getElementById('radarChart').getContext('2d');
        if (this.chartInstance) {
            this.chartInstance.destroy();
        }
        this.chartInstance = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Accuracy', 'Konsistensi', 'Focus', 'Technique', 'Strength', 'Endurance', 'Stamina'],
                datasets: [{
                    label: 'Statistik Pemanah',
                    data: [
                        this.skillData.accuracy,
                        this.skillData.power,
                        this.skillData.focus,
                        this.skillData.technique,
                        this.skillData.strength,
                        this.skillData.endurance,
                        this.skillData.stamina
                    ],
                    fill: true,
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(59, 130, 246, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        pointLabels: { color: '#374151' },
                        ticks: { backdropColor: 'transparent', color: '#9ca3af' },
                        grid: { color: '#e5e7eb' },
                        angleLines: { color: '#e5e7eb' }
                    }
                }
            }
        });
    }
}" x-init="updateChart()">


{{-- Menampilkan Isi Dari Inputan  --}}
@php
    $anggotaPemanah = $struktur->filter(fn($item) => strtolower($item->jabatan) === 'anggota');
    $strukturLainnya = $struktur->reject(fn($item) => strtolower($item->jabatan) === 'anggota');
@endphp

<div x-data="{ showModal: false, showEditModal: false, skillData: {} }">

    {{-- Bagian Struktur Lainnya --}}
    @if ($strukturLainnya->count() > 0)
        <div id="struktur-lain" class="mt-14 text-center">
            <h3 class="text-3xl font-extrabold text-black mb-6">STRUKTUR LAINNYA</h3>

            <ul class="flex flex-wrap gap-6 justify-center">
                @foreach ($strukturLainnya as $item)
                    @if ($item->foto)
                        <li class="max-w-[200px]">
                            <div
                                class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mx-auto text-center">
                                {{-- FOTO klik = radar chart --}}
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                    class="cursor-pointer h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105"
                                    @click="showModal = true; skillData = {{ Js::from($item->skill_data ?? []) }}" />

                                <div class="p-3">
                                    <p class="text-gray-800 font-bold text-2xl">{{ $item->nama }}</p>
                                    <p class="text-gray-500 text-sm">{{ $item->jabatan }}</p>

                                    {{-- Tombol "Lihat Detail" = form input --}}
                                    <button @click="showEditModal = true; skillData = {{ Js::from($item->skill_data ?? []) }}"
                                        class="mt-2 text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Bagian Anggota Pemanah --}}
    @if ($anggotaPemanah->count() > 0)
        <div id="anggota-pemanah" class="mt-14 text-center">
            <h3 class="text-3xl font-extrabold text-black mb-6">ANGGOTA PEMANAH</h3>

            <ul class="flex flex-wrap gap-6 justify-center">
                @foreach ($anggotaPemanah as $item)
                    @if ($item->foto)
                        <li class="max-w-[200px]">
                            <div
                                class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mx-auto text-center">
                                {{-- FOTO klik = radar chart --}}
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                    class="cursor-pointer h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105"
                                    @click="showModal = true; skillData = {{ Js::from($item->skill_data ?? []) }}" />

                                <div class="p-3">
                                    <p class="text-gray-800 font-bold text-2xl">{{ $item->nama }}</p>

                                    {{-- Tombol "Lihat Detail" = form input --}}
                                    <button @click="showEditModal = true; skillData = {{ Js::from($item->skill_data ?? []) }}"
                                        class="mt-2 text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Modal Radar Chart + Input --}}
<div x-show="showModal" x-transition x-data="{ view: 'preview' }"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div @click.outside="showModal = false" class="bg-white rounded-xl w-[95%] max-w-5xl p-6 relative">
        <!-- Tombol Tutup -->
        <button @click="showModal = false"
            class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>
        <h3 class="text-xl font-semibold text-center mb-6">Skill Pemanah</h3>
        <!-- Tombol Toggle Tampilan -->
        <div class="flex justify-center mb-6 gap-4">
            <button @click="view = 'preview'"
                :class="view === 'preview' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-4 py-2 rounded-lg text-sm font-semibold">👁️ Lihat Skill</button>
            <button @click="view = 'input'"
                :class="view === 'input' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-4 py-2 rounded-lg text-sm font-semibold">📝 Edit/Tambah Skill</button>
        </div>

        <!-- Preview Chart -->
        <div x-show="view === 'preview'" class="flex flex-col md:flex-row gap-8 items-start justify-center">
            <!-- Profil + Skill -->
            <div class="w-full md:w-1/2 space-y-4">
                <!-- Foto -->
                <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Foto Profil"
                    class="rounded-xl shadow-lg w-48 h-48 object-cover mx-auto" />
                    <p class="flex justify-between"><span>Accuracy</span> <span class="font-bold text-blue-600" x-text="skillData.accuracy"></span></p>
                    <p class="flex justify-between"><span>Power</span> <span class="font-bold text-blue-600" x-text="skillData.power"></span></p>
                    <p class="flex justify-between"><span>Focus</span> <span class="font-bold text-blue-600" x-text="skillData.focus"></span></p>
                    <p class="flex justify-between"><span>Technique</span> <span class="font-bold text-red-600" x-text="skillData.technique"></span></p>
                    <p class="flex justify-between"><span>Strength</span> <span class="font-bold text-blue-600" x-text="skillData.strength"></span></p>
                    <p class="flex justify-between"><span>Endurance</span> <span class="font-bold text-red-600" x-text="skillData.endurance"></span></p>
                    <p class="flex justify-between"><span>Stamina</span> <span class="font-bold text-blue-600" x-text="skillData.stamina"></span></p>
               
                <!-- Skill Card -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <template x-for="(val, key) in skillData" :key="key">
                        <div class="bg-gray-100 p-3 rounded-lg shadow text-sm flex flex-col justify-between">
                            <span class="capitalize text-gray-600 font-medium" x-text="key"></span>
                            <span :class="val < 60 ? 'text-red-600' : 'text-blue-600'" class="font-bold text-lg" x-text="val"></span>
                        </div>
                    </template>
                </div>
            </div>
            <!-- Radar Chart -->
            <div class="w-full md:w-1/2 flex justify-center items-center">
                <canvas id="radarChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- Form Input Skill -->
        <div x-show="view === 'input'" class="mt-6">
            <form @submit.prevent="submitSkill()" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <template x-for="(val, key) in skillData" :key="key">
                    <div>
                        <label class="block text-sm font-medium capitalize mb-1" x-text="key"></label>
                        <input type="number" min="0" max="100" step="1" class="w-full p-2 border rounded"
                            x-model="skillData[key]">
                    </div>
                </template>
                <div class="md:col-span-2">
                 
                    <form action="">
                        <label class="block text-sm font-medium mb-1">Push Up</label>
                        <input class="w-full p-2 border rounded" rows="3" placeholder="Input untuk Strenght..."></input>
                       
                        <label class="block text-sm font-medium mb-1">Tahan Nafas</label>
                        <input class="w-full p-2 border rounded" rows="3" placeholder="Input untuk Focus..."></input>
                       
                        <label class="block text-sm font-medium mb-1">On/Of Target</label>
                        <input class="w-full p-2 border rounded" rows="3" placeholder="Input untuk Konsistensi..."></input>
                        <input class="w-full p-2 border rounded" rows="3" placeholder="Input untuk Konsistensi..."></input>
                       
                        <label class="block text-sm font-medium mb-1">Konsistensi</label>
                        <input class="w-full p-2 border rounded" rows="3" placeholder="Input untuk Konsistensi..."></input>
                       
                        <label class="block text-sm font-medium mb-1">Waktu Latihan</label>
                        <input class="w-full p-2 border rounded" rows="3" placeholder="Input untuk Konsistensi..."></input>
                       
                    </form>

                    <button type="submit"
                        class="w-full bg-green-600 text-white py-2 rounded-lg shadow hover:bg-blue-700">
                        💾 Simpan Skill
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



    {{-- Modal detail Pemanah --}}
<div x-show="showEditModal" x-transition
class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
<div @click.outside="showEditModal = false" class="bg-white rounded-xl w-[90%] max-w-lg p-6 relative">
    <button @click="showEditModal = false"
        class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>
    
    <h3 class="text-xl font-semibold text-center mb-4">Detail Pemanah</h3>
    <!-- Foto -->
    <div class="flex justify-center mb-4">
        <img :src="detail.foto ? '/storage/' + detail.foto : '/images/default.jpg'" alt="Foto Pemanah"
            class="w-32 h-32 object-cover rounded-full border-4 border-blue-500 shadow-md">
    </div>
    <!-- Nama Anggota -->
    <div class="text-center mb-4">
        <h3 class="text-2xl font-bold text-blue-600" x-text="detail.nama"></h3>
    </div>
    <!-- Grid Informasi -->
    <div class="grid grid-cols-2 gap-3 text-sm text-gray-700">
        <div class="font-medium">Jenis Kelamin</div>
        <div x-text="detail.jenis_kelamin"></div>

        <div class="font-medium">Tempat, Tanggal Lahir</div>
        <div><span x-text="detail.tempat_lahir"></span>, <span x-text="detail.tanggal_lahir"></span></div>

        <div class="font-medium">No. HP / WA</div>
        <div x-text="detail.no_hp"></div>

        <div class="font-medium">Alamat</div>
        <div x-text="detail.alamat"></div>

        <div class="font-medium">Jabatan</div>
        <div x-text="detail.jabatan"></div>

        <template x-if="detail.jabatan === 'Anggota' || detail.jabatan === 'Pembina'">
            <template>
                <div class="font-medium">Divisi</div>
                <div x-text="detail.divisi"></div>

                <div class="font-medium">Tingkat Keahlian</div>
                <div x-text="detail.keahlian"></div>
            </template>
        </template>

        <div class="font-medium">Tanggal Bergabung</div>
        <div x-text="detail.tanggal_bergabung"></div>
    </div>
    <div class="flex justify-end mb-4">
        <a href=""
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow">
            + Edit
        </a>
    </div>
</div>



</div>




<h2 class="text-2xl font-bold text-gray-700 mt-16 mb-4">📋 Data Struktur Organisasi</h2>
<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($struktur as $item)
                <tr>
                    <td class="py-4 px-6">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="h-16 w-16 object-cover rounded-full">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-6">{{ $item->nama }}</td>
                    <td class="py-4 px-6">{{ $item->jabatan }}</td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.struktur.index', ['edit' => $item->id]) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded-lg text-sm">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">Belum ada data struktur organisasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
