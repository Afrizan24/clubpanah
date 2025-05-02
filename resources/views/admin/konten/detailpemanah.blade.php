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
    updateChart() {
        const ctx = document.getElementById('radarChart').getContext('2d');
        new Chart(ctx, {
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

    <!-- Kartu Profil -->
    @if (isset($struktur) && count($struktur) > 0)
        @foreach ($struktur as $item)
            <div class="flex justify-center mt-10">
                <ul class="flex flex-wrap gap-6 justify-center">
                    @if ($item->foto)
                        <li>
                            <button @click="showModal = true"
                                class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 max-w-[200px] mx-auto">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Profil"
                                    class="h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105" />
                                <div class="p-3">
                                    <p class="text-gray-800 font-bold text-2xl leading-snug text-center">
                                        {{ $item->nama }}</p>
                                </div>
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
        @endforeach
    @endif

    <!-- Modal Detail -->
    <div x-show="showModal" x-transition
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.outside="showModal = false" class="bg-white rounded-xl w-[90%] max-w-4xl p-6 relative">
            <button @click="showModal = false"
                class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>
            <h3 class="text-xl font-semibold text-center mb-6">Detail Pemanah</h3>

            <!-- Flex Konten -->
            <div class="flex flex-col md:flex-row gap-8 items-center justify-center">
                <!-- Foto -->
                <div class="w-48">
                    <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Foto Profil"
                        class="mb-5 rounded-xl shadow-md w-full object-cover" />

                    <p class="flex justify-between"><span>Accuracy</span> <span class="font-bold text-blue-600"
                            x-text="skillData.accuracy"></span></p>
                    <p class="flex justify-between"><span>Power</span> <span class="font-bold text-blue-600"
                            x-text="skillData.power"></span></p>
                    <p class="flex justify-between"><span>Focus</span> <span class="font-bold text-blue-600"
                            x-text="skillData.focus"></span></p>
                    <p class="flex justify-between"><span>Technique</span> <span class="font-bold text-red-600"
                            x-text="skillData.technique"></span></p>
                    <p class="flex justify-between"><span>Strength</span> <span class="font-bold text-blue-600"
                            x-text="skillData.strength"></span></p>
                    <p class="flex justify-between"><span>Endurance</span> <span class="font-bold text-red-600"
                            x-text="skillData.endurance"></span></p>
                    <p class="flex justify-between"><span>Stamina</span> <span class="font-bold text-blue-600"
                            x-text="skillData.stamina"></span></p>
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
            <h3 class="text-xl font-semibold text-center mb-4"> Edit/Isi Skill Pemanah</h3>

            <form class="space-y-4" @submit.prevent="updateChart()">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Accuracy</label>
                        <input type="number" min="0" max="100" x-model="skillData.accuracy"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 85" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Power</label>
                        <input type="number" min="0" max="100" x-model="skillData.power"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 70" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Focus</label>
                        <input type="number" min="0" max="100" x-model="skillData.focus"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 90" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Technique</label>
                        <input type="number" min="0" max="100" x-model="skillData.technique"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 60" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Strength</label>
                        <input type="number" min="0" max="100" x-model="skillData.strength"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 75" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Endurance</label>
                        <input type="number" min="0" max="100" x-model="skillData.endurance"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 65" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Stamina</label>
                        <input type="number" min="0" max="100" x-model="skillData.stamina"
                            class="w-full border rounded px-3 py-2" placeholder="Contoh: 80" />
                    </div>
                </div>

                <div class="text-center pt-4">
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-700 mb-4">📋 Data Struktur Organisasi</h2>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan
                </th>
                <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            @if (isset($struktur) && count($struktur) > 0)
                @foreach ($struktur as $item)
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
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">Belum ada data struktur organisasi.
                    </td>
                </tr>
            @endif


        </tbody>
    </table>
</div>
<h2 class="text-2xl font-bold text-gray-700 mb-4">📋 Data Struktur Organisasi</h2>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan
                </th>
                <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            @if (isset($struktur) && count($struktur) > 0)
                @foreach ($struktur as $item)
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
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">Belum ada data struktur organisasi.
                    </td>
                </tr>
            @endif


        </tbody>
    </table>
</div>
