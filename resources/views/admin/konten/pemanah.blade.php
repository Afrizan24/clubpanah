<div x-data="{ open: false, data: {} }">
    {{-- Form Input Anggota --}}
    <h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Data Anggota Pemanah</h2>
    @if (session('successpemanah'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('successpemanah') }}</span>
        </div>
    @endif

    <form id="pemanahForm" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST"
        action="{{ route('admin.struktur.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" class="w-full p-3 border rounded-lg" placeholder="Nama lengkap" name="nama">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
            <select class="w-full p-3 border rounded-lg" name="jenis_kelamin">
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tempat Lahir</label>
            <input type="text" class="w-full p-3 border rounded-lg" placeholder="Contoh: Jakarta"
                name="tempat_lahir">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
            <input type="date" class="w-full p-3 border rounded-lg" name="tanggal_lahir">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Nomor Telepon / WA</label>
            <input type="number" class="w-full p-3 border rounded-lg" placeholder="+62..." name="no_hp">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium mb-1">Alamat Domisili</label>
            <textarea class="w-full p-3 border rounded-lg" rows="2" placeholder="Alamat lengkap..." name="alamat"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Jabatan</label>
            <select id="jabatanSelect" class="w-full p-3 border rounded-lg" name="jabatan">
                <option value="">Pilih</option>
                <option value="Pembina">Pembina</option>
                <option value="Ketua">Ketua</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Anggota">Anggota</option>
            </select>
        </div>
        <div id="tingkatField">
            <label class="block text-sm font-medium mb-1">Tingkat Keahlian</label>
            <select class="w-full p-3 border rounded-lg" name="keahlian">
                <option value="">Pilih</option>
                <option value="Pemula">Pemula</option>
                <option value="Menengah">Menengah</option>
                <option value="Lanjutan">Lanjutan</option>
            </select>
        </div>
        <div id="divisiField">
            <label class="block text-sm font-medium mb-1">Divisi</label>
            <select class="w-full p-3 border rounded-lg" name="divisi">
                <option value="">Pilih</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Foto Profil (URL)</label>
            <input type="file" class="w-full p-3 border rounded-lg" name="foto">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tanggal Bergabung</label>
            <input type="date" class="w-full p-3 border rounded-lg" name="tanggal_bergabung">
        </div>
        <div class="md:col-span-2">
            <button class="w-full bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-2">
                💾 Simpan Data Pemanah
            </button>
        </div>
    </form>

    {{-- Table Anggota --}}
    <h2 class="text-2xl font-bold text-gray-700 mb-4">📋 Data Struktur Organisasi</h2>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
                    </th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                    </th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan
                    </th>
                    <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                    </th>
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
                                <a href="#"
                                    @click.prevent="
                                        open = true;
                                        data = {
                                            id: {{ $item->id }},
                                            nama: '{{ $item->nama }}',
                                            jenis_kelamin: '{{ $item->jenis_kelamin }}',
                                            tempat_lahir: '{{ $item->tempat_lahir }}',
                                            tanggal_lahir: '{{ $item->tanggal_lahir }}',
                                            no_hp: '{{ $item->no_hp }}',
                                            alamat: `{{ $item->alamat }}`,
                                            jabatan: '{{ $item->jabatan }}',
                                            keahlian: '{{ $item->keahlian }}',
                                            divisi: '{{ $item->divisi }}',
                                            tanggal_bergabung: '{{ $item->tanggal_bergabung }}'
                                        }
                                    "
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
                        <td colspan="4" class="text-center py-6 text-gray-400">Belum ada data struktur organisasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Edit --}}
    <div x-show="open" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl relative">
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500">✖</button>
            <h2 class="text-xl font-bold text-gray-700 mb-4">✏️ Edit Data Pemanah</h2>
            <form :action="`/admin/struktur/${data.id}`" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="nama" x-model="data.nama" class="p-2 border rounded"
                        placeholder="Nama Lengkap">
                    <select name="jenis_kelamin" x-model="data.jenis_kelamin" class="p-2 border rounded">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                    <input type="text" name="tempat_lahir" x-model="data.tempat_lahir" class="p-2 border rounded"
                        placeholder="Tempat Lahir">
                    <input type="date" name="tanggal_lahir" x-model="data.tanggal_lahir"
                        class="p-2 border rounded">
                    <input type="text" name="no_hp" x-model="data.no_hp" class="p-2 border rounded"
                        placeholder="No. HP">
                    <textarea name="alamat" x-model="data.alamat" class="p-2 border rounded" placeholder="Alamat"></textarea>
                    <select name="jabatan" x-model="data.jabatan" class="p-2 border rounded">
                        <option>Pembina</option>
                        <option>Ketua</option>
                        <option>Sekretaris</option>
                        <option>Bendahara</option>
                        <option>Anggota</option>
                    </select>
                    <select name="keahlian" x-model="data.keahlian" class="p-2 border rounded">
                        <option>Pemula</option>
                        <option>Menengah</option>
                        <option>Lanjutan</option>
                    </select>
                    <select name="divisi" x-model="data.divisi" class="p-2 border rounded">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>
                    <input type="date" name="tanggal_bergabung" x-model="data.tanggal_bergabung"
                        class="p-2 border rounded">
                    <input type="file" name="foto" class="p-2 border rounded">
                </div>
                <div class="mt-4 text-right">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    const jabatanSelect = document.getElementById('jabatanSelect');
    const divisiField = document.getElementById('divisiField');
    const tingkatField = document.getElementById('tingkatField')

    function toggleDivisiField() {
        const jabatan = jabatanSelect.value;
        if (jabatan === 'Anggota' || jabatan === 'Pembina' || jabatan === '') {
            divisiField.style.display = 'block';
        } else {
            divisiField.style.display = 'none';
        }
    }

    function toggleTingkatField() {
        const jabatan = jabatanSelect.value;
        if (jabatan === 'Anggota' || jabatan === '') {
            tingkatField.style.display = 'block';
        } else {
            tingkatField.style.display = 'none';
        }
    }

    // Jalankan saat pertama kali halaman dimuat
    toggleDivisiField();
    toggleTingkatField();

    // Jalankan setiap kali jabatan berubah
    jabatanSelect.addEventListener('change', toggleDivisiField);
    jabatanSelect.addEventListener('change', toggleTingkatField);
</script>
