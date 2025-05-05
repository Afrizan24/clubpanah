<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Data Anggota Pemanah</h2>
@if (session('successpemanah'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('successpemanah') }}</span>
    </div>
@endif
<form id="pemanahForm" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST"
    action="{{ route('admin.struktur.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Kolom 1 -->
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
        <input type="text" class="w-full p-3 border rounded-lg" placeholder="Contoh: Jakarta" name="tempat_lahir">
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


<script>
    const jabatanSelect = document.getElementById('jabatanSelect');
    const divisiField = document.getElementById('divisiField');
    const tingkatField = document.getElementById('tingkatField');

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
