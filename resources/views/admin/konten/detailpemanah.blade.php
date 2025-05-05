<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Data Anggota Pemanah</h2>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Alpine.js dan Chart.js -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div x-data="memberData()">
    {{-- Menampilkan Isi Dari Inputan  --}}
    @php
        $anggotaPemanah = $struktur->filter(fn($item) => strtolower($item->jabatan) === 'anggota');
        $strukturLainnya = $struktur->reject(fn($item) => strtolower($item->jabatan) === 'anggota');
    @endphp

    <div>
        {{-- Bagian Struktur Lainnya --}}
        @if ($strukturLainnya->count() > 0)
            <div id="struktur-lain" class="mt-14 text-center">
                <h3 class="text-3xl font-extrabold text-black mb-6">STRUKTUR LAINNYA</h3>

                <ul class="flex flex-wrap gap-6 justify-center">
                    @foreach ($strukturLainnya as $item)
                        @if ($item->foto)
                            <li class="max-w-[200px]">
                                <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mx-auto text-center">
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                        class="{{ strtolower($item->jabatan) === 'anggota' ? 'cursor-pointer' : '' }} h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105"
                                        @if (strtolower($item->jabatan) === 'anggota') @click="showModal = true; skillData = {{ Js::from($item->statistikLatihans->first() ?? []) }}; currentMember = {{ Js::from($item) }}; $nextTick(() => updateChart())" @endif />

                                    <div class="p-3">
                                        <p class="text-gray-800 font-bold text-2xl">{{ $item->nama }}</p>
                                        <p class="text-gray-500 text-sm">{{ $item->jabatan }}</p>

                                        <button @click="showEditModal = true; currentMember = {{ Js::from($item) }}"
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
                                <div class="group block rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mx-auto text-center">
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                        class="cursor-pointer h-48 w-full object-cover rounded-t-xl transform transition-transform duration-300 group-hover:scale-105"
                                        @click="showModal = true; skillData = {{ Js::from($item->statistikLatihans->first() ?? []) }}; currentMember = {{ Js::from($item) }}; $nextTick(() => updateChart())" />

                                    <div class="p-3">
                                        <p class="text-gray-800 font-bold text-2xl">{{ $item->nama }}</p>

                                        <button @click="showEditModal = true; currentMember = {{ Js::from($item) }}"
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

        {{-- Modal Radar Chart --}}
        <div x-show="showModal" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.outside="showModal = false" class="bg-white rounded-xl w-[95%] max-w-5xl p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>

                <h3 class="text-xl font-semibold text-center mb-6">Statistik Latihan Pemanah</h3>

                <!-- Preview Chart -->
                <div class="flex flex-col md:flex-row gap-8 items-start justify-center">
                    <!-- Profil + Skill -->
                    <div class="w-full md:w-1/2 space-y-4">
                        <!-- Foto -->
                        <div class="flex justify-center mb-4">
                            <div class="relative">
                                <img :src="currentMember ? '/storage/' + currentMember.foto : '/images/default.jpg'"
                                    alt="Foto Pemanah"
                                    class="w-32 h-32 object-cover rounded-full border-4 border-blue-500 shadow-md">
                                <label for="foto_statistik" class="absolute bottom-0 right-0 bg-blue-600 text-white p-1 rounded-full cursor-pointer hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </label>
                                <input type="file" id="foto_statistik" @change="handleFotoChange" accept="image/*" class="hidden">
                            </div>
                        </div>

                        <!-- Data Statistik -->
                        <div class="space-y-3">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-semibold text-gray-700">Data Latihan</h4>
                                    <button @click="isEditing = !isEditing" class="text-sm px-3 py-1 rounded-lg"
                                        :class="isEditing ? 'bg-gray-200 text-gray-700' : 'bg-blue-600 text-white'">
                                        <span x-text="isEditing ? 'Batal' : 'Edit'"></span>
                                    </button>
                                </div>
                                <div class="grid grid-cols-2 gap-2 text-sm">
                                    <div class="text-gray-600">Push Up</div>
                                    <div class="font-medium">
                                        <template x-if="!isEditing">
                                            <span x-text="skillData.push_up || 0">0</span>
                                        </template>
                                        <template x-if="isEditing">
                                            <input type="number" x-model="skillData.push_up"
                                                class="w-full p-1 border rounded" min="0" max="100">
                                        </template>
                                    </div>

                                    <div class="text-gray-600">Tahan Nafas</div>
                                    <div class="font-medium">
                                        <template x-if="!isEditing">
                                            <span x-text="skillData.tahan_nafas || 0">0</span>
                                        </template>
                                        <template x-if="isEditing">
                                            <input type="number" x-model="skillData.tahan_nafas"
                                                class="w-full p-1 border rounded" min="0" max="100">
                                        </template>
                                    </div>

                                    <div class="text-gray-600">On Target</div>
                                    <div class="font-medium">
                                        <template x-if="!isEditing">
                                            <span x-text="skillData.on_target || 0">0</span>
                                        </template>
                                        <template x-if="isEditing">
                                            <input type="number" x-model="skillData.on_target"
                                                class="w-full p-1 border rounded" min="0" max="100">
                                        </template>
                                    </div>

                                    <div class="text-gray-600">Off Target</div>
                                    <div class="font-medium">
                                        <template x-if="!isEditing">
                                            <span x-text="skillData.off_target || 0">0</span>
                                        </template>
                                        <template x-if="isEditing">
                                            <input type="number" x-model="skillData.off_target"
                                                class="w-full p-1 border rounded" min="0" max="100">
                                        </template>
                                    </div>

                                    <div class="text-gray-600">Latihan Konsentrasi</div>
                                    <div class="font-medium">
                                        <template x-if="!isEditing">
                                            <span x-text="skillData.latihan_konsentrasi || 0">0</span>
                                        </template>
                                        <template x-if="isEditing">
                                            <input type="number" x-model="skillData.latihan_konsentrasi"
                                                class="w-full p-1 border rounded" min="0" max="100">
                                        </template>
                                    </div>

                                    <div class="text-gray-600">Waktu Latihan</div>
                                    <div class="font-medium">
                                        <template x-if="!isEditing">
                                            <span x-text="skillData.waktu_latihan || 0">0</span>
                                        </template>
                                        <template x-if="isEditing">
                                            <input type="number" x-model="skillData.waktu_latihan"
                                                class="w-full p-1 border rounded" min="0" max="100">
                                        </template>
                                    </div>
                                </div>

                                <template x-if="isEditing">
                                    <div class="mt-4 flex justify-end">
                                        <button @click="saveStatistics()"
                                            class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </template>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-700 mb-2">Nilai Skill</h4>
                                <div class="grid grid-cols-2 gap-2 text-sm">
                                    <div class="text-gray-600">Accuracy</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.on_target ? Math.min(100, skillData.on_target * 2) : 0">0</div>

                                    <div class="text-gray-600">Power</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.push_up ? Math.min(100, skillData.push_up * 2) : 0">0</div>

                                    <div class="text-gray-600">Focus</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.latihan_konsentrasi ? Math.min(100, skillData.latihan_konsentrasi * 2) : 0">0</div>

                                    <div class="text-gray-600">Technique</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.off_target ? Math.min(100, skillData.off_target > 0 ? 100 - skillData.off_target * 5 : 90) : 0">0</div>

                                    <div class="text-gray-600">Strength</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.push_up ? Math.min(100, skillData.push_up * 2) : 0">0</div>

                                    <div class="text-gray-600">Endurance</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.tahan_nafas ? Math.min(100, skillData.tahan_nafas * 2) : 0">0</div>

                                    <div class="text-gray-600">Stamina</div>
                                    <div class="font-medium text-blue-600"
                                        x-text="skillData.waktu_latihan ? Math.min(100, skillData.waktu_latihan * 2) : 0">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Radar Chart -->
                    <div class="w-full md:w-1/2 flex justify-center items-center" style="height: 400px;">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal detail Pemanah --}}
        <div x-show="showEditModal" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.outside="showEditModal = false" class="bg-white rounded-xl w-[90%] max-w-lg p-6 relative">
                <button @click="showEditModal = false" class="absolute top-2 right-3 text-gray-600 hover:text-red-500 text-2xl">&times;</button>
                
                <h3 class="text-xl font-semibold text-center mb-4">Detail Pemanah</h3>
                
                <!-- Foto -->
                <div class="flex justify-center mb-4">
                    <div class="relative">
                        <img :src="currentMember ? '/storage/' + currentMember.foto : '/images/default.jpg'"
                            alt="Foto Pemanah"
                            class="w-32 h-32 object-cover rounded-full border-4 border-blue-500 shadow-md">
                        <label for="foto_detail" class="absolute bottom-0 right-0 bg-blue-600 text-white p-1 rounded-full cursor-pointer hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </label>
                        <input type="file" id="foto_detail" @change="handleFotoChange" accept="image/*" class="hidden">
                    </div>
                </div>

                <!-- Form Edit -->
                <form @submit.prevent="saveMemberData" class="space-y-4">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" x-model="currentMember.nama" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select x-model="currentMember.jenis_kelamin" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" x-model="currentMember.tempat_lahir" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" x-model="currentMember.tanggal_lahir" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. HP / WA</label>
                        <input type="text" x-model="currentMember.no_hp" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea x-model="currentMember.alamat" rows="2"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <select x-model="currentMember.jabatan" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Pembina">Pembina</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>

                    <!-- Divisi (hanya untuk Anggota dan Pembina) -->
                    <template x-if="currentMember && (currentMember.jabatan === 'Anggota' || currentMember.jabatan === 'Pembina')">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Divisi</label>
                            <select x-model="currentMember.divisi" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Divisi</option>
                                <option value="A">Divisi A</option>
                                <option value="B">Divisi B</option>
                                <option value="C">Divisi C</option>
                                <option value="D">Divisi D</option>
                            </select>
                        </div>
                    </template>

                    <!-- Tingkat Keahlian (hanya untuk Anggota) -->
                    <template x-if="currentMember && currentMember.jabatan === 'Anggota'">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tingkat Keahlian</label>
                            <select x-model="currentMember.keahlian" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Tingkat</option>
                                <option value="Pemula">Pemula</option>
                                <option value="Menengah">Menengah</option>
                                <option value="Lanjutan">Lanjutan</option>
                            </select>
                        </div>
                    </template>

                    <!-- Tanggal Bergabung -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Bergabung</label>
                        <input type="date" x-model="currentMember.tanggal_bergabung" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-end">
                        <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('memberData', () => ({
        showModal: false,
        showEditModal: false,
        currentMember: null,
        skillData: {},
        chartInstance: null,
        isEditing: false,
        newFoto: null,

        init() {
            this.updateChart();
        },

        handleFotoChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.newFoto = file;
                // Preview foto
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.querySelector('img[alt="Foto Pemanah"]');
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        updateChart() {
            const ctx = document.getElementById('radarChart').getContext('2d');
            if (this.chartInstance) {
                this.chartInstance.destroy();
            }

            const stats = this.skillData;
            const skillValues = {
                accuracy: stats.on_target ? Math.min(100, stats.on_target * 2) : 0,
                power: stats.push_up ? Math.min(100, stats.push_up * 2) : 0,
                focus: stats.latihan_konsentrasi ? Math.min(100, stats.latihan_konsentrasi * 2) : 0,
                technique: stats.off_target ? Math.min(100, stats.off_target > 0 ? 100 - stats.off_target * 5 : 90) : 0,
                strength: stats.push_up ? Math.min(100, stats.push_up * 2) : 0,
                endurance: stats.tahan_nafas ? Math.min(100, stats.tahan_nafas * 2) : 0,
                stamina: stats.waktu_latihan ? Math.min(100, stats.waktu_latihan * 2) : 0
            };

            this.chartInstance = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['Accuracy', 'Power', 'Focus', 'Technique', 'Strength', 'Endurance', 'Stamina'],
                    datasets: [{
                        label: 'Statistik Pemanah',
                        data: [
                            skillValues.accuracy,
                            skillValues.power,
                            skillValues.focus,
                            skillValues.technique,
                            skillValues.strength,
                            skillValues.endurance,
                            skillValues.stamina
                        ],
                        fill: true,
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            min: 0,
                            max: 100,
                            beginAtZero: true,
                            pointLabels: {
                                color: '#374151',
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                backdropColor: 'transparent',
                                color: '#9ca3af',
                                stepSize: 20,
                                font: {
                                    size: 10
                                }
                            },
                            grid: {
                                color: '#e5e7eb',
                                lineWidth: 1
                            },
                            angleLines: {
                                color: '#e5e7eb',
                                lineWidth: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        },

        async saveStatistics() {
            try {
                if (!this.skillData.id) {
                    throw new Error('ID statistik tidak ditemukan');
                }

                // Get CSRF token from meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                if (!csrfToken) {
                    throw new Error('CSRF token tidak ditemukan');
                }

                const token = csrfToken.getAttribute('content');
                if (!token) {
                    throw new Error('CSRF token kosong');
                }
                
                console.log('Sending data:', this.skillData);

                const response = await fetch(`/admin/statistik-latihan/${this.skillData.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        push_up: parseInt(this.skillData.push_up) || 0,
                        tahan_nafas: parseInt(this.skillData.tahan_nafas) || 0,
                        on_target: parseInt(this.skillData.on_target) || 0,
                        off_target: parseInt(this.skillData.off_target) || 0,
                        latihan_konsentrasi: parseInt(this.skillData.latihan_konsentrasi) || 0,
                        waktu_latihan: parseInt(this.skillData.waktu_latihan) || 0
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    this.isEditing = false;
                    this.$nextTick(() => this.updateChart());
                    alert('Data statistik berhasil disimpan');
                } else {
                    throw new Error(result.message || 'Gagal menyimpan data statistik');
                }
            } catch (error) {
                console.error('Error:', error);
                alert(error.message || 'Gagal menyimpan data statistik');
            }
        },

        async saveMemberData() {
            try {
                // Get CSRF token from meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                if (!csrfToken) {
                    throw new Error('CSRF token tidak ditemukan');
                }

                const token = csrfToken.getAttribute('content');
                if (!token) {
                    throw new Error('CSRF token kosong');
                }

                // Create FormData object
                const formData = new FormData();
                
                // Append all member data
                Object.keys(this.currentMember).forEach(key => {
                    if (key !== 'foto') { // Skip foto field as we handle it separately
                        formData.append(key, this.currentMember[key]);
                    }
                });

                // Append new foto if exists
                if (this.newFoto) {
                    formData.append('foto', this.newFoto);
                }

                const response = await fetch(`/admin/struktur/${this.currentMember.id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    body: formData
                });

                // Check if response is ok
                if (!response.ok) {
                    // Try to get error message from response
                    let errorMessage = 'Gagal menyimpan data anggota';
                    try {
                        const errorData = await response.json();
                        errorMessage = errorData.message || errorMessage;
                    } catch (e) {
                        // If response is not JSON, get text
                        const text = await response.text();
                        if (text) {
                            errorMessage = text;
                        }
                    }
                    throw new Error(errorMessage);
                }

                // Try to parse JSON response
                let result;
                try {
                    result = await response.json();
                } catch (e) {
                    // If response is not JSON, just continue
                    result = { success: true };
                }

                this.showEditModal = false;
                alert('Data anggota berhasil disimpan');
                window.location.reload();

            } catch (error) {
                console.error('Error:', error);
                alert(error.message || 'Gagal menyimpan data anggota');
            }
        }
    }));
});
</script>
