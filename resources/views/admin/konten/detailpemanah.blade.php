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
                    label: 'Data Pemanah',
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

@php
    $anggotaPemanah = $struktur->filter(fn($item) => strtolower($item->jabatan) === 'anggota');
    $strukturLainnya = $struktur->reject(fn($item) => strtolower($item->jabatan) === 'anggota');
@endphp

{{-- Bagian Struktur Lainnya (selain anggota) --}}
@if ($strukturLainnya->count() > 0)
    <div id="struktur-lain" class="mt-14 text-center">
        <h3 class="text-3xl font-extrabold text-black mb-6">STRUKTUR LAINNYA</h3>

        <ul class="flex flex-wrap gap-6 justify-center">
            @foreach ($strukturLainnya as $item)
                @if ($item->foto)
                    <li>
                        <button @click="showModal = true"
                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                            <div class="p-3 text-center">
                                <p class="text-gray-800 font-bold text-2xl">{{ $item->nama }}</p>
                                <p class="text-gray-500 text-sm">{{ $item->jabatan }}</p>
                            </div>
                        </button>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

{{-- Bagian Khusus Anggota --}}
@if ($anggotaPemanah->count() > 0)
    <div id="anggota-pemanah" class="mt-14 text-center">
        <h3 class="text-3xl font-extrabold text-black mb-6">ANGGOTA PEMANAH</h3>

        <ul class="flex flex-wrap gap-6 justify-center">
            @foreach ($anggotaPemanah as $item)
                @if ($item->foto)
                    <li>
                        <button @click="showModal = true"
                            class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                            <div class="p-3 text-center">
                                <p class="text-gray-800 font-bold text-2xl">{{ $item->nama }}</p>
                            </div>
                        </button>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif




    <!-- Modal Detail -->
    <div x-show="showModal" x-transition
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.outside="showModal = false" class="bg-white rounded-xl w-[90%] max-w-4xl p-6 relative">
            <button @click="showModal = false"
                class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>
            <h3 class="text-xl font-semibold text-center mb-6">Detail Pemanah</h3>

            <div class="flex flex-col md:flex-row gap-8 items-center justify-center">
                <!-- Foto -->
                <div class="w-48">
                    <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Foto Profil"
                        class="mb-5 rounded-xl shadow-md w-full object-cover" />

                    <template x-for="(val, key) in skillData" :key="key">
                        <p class="flex justify-between capitalize">
                            <span x-text="key"></span>
                            <span class="font-bold text-blue-600" x-text="val"></span>
                        </p>
                    </template>
                </div>

                <!-- Radar Chart -->
                <div class="w-[350px] h-[350px]">
                    <canvas id="radarChart" width="250" height="250"></canvas>
                </div>
            </div>

            <!-- Tombol untuk buka modal edit -->
            <div class="text-center mt-4">
                <button @click="showEditModal = true"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Edit
                    Skill</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Skill -->
    <div x-show="showEditModal" x-transition
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.outside="showEditModal = false" class="bg-white rounded-xl w-[90%] max-w-lg p-6 relative">
            <button @click="showEditModal = false"
                class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>
            <h3 class="text-xl font-semibold text-center mb-4">Edit/Isi Skill Pemanah</h3>

            <form class="space-y-4" @submit.prevent="updateChart()">
                <div class="grid grid-cols-2 gap-4">
                    <template x-for="(val, key) in skillData" :key="key">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 capitalize" x-text="key"></label>
                            <input type="number" min="0" max="100" x-model="skillData[key]"
                                class="w-full border rounded px-3 py-2" />
                        </div>
                    </template>
                </div>

                <div class="text-center pt-4">
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Simpan</button>
                </div>
            </form>
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
