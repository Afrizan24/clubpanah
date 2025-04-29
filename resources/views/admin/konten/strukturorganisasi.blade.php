<div class="p-8">

<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Struktur Organisasi</h2>

<!-- <form id="strukturForm">

    <label class="block text-sm font-medium mb-1">Ketua</label>
    <input type="text" name="ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Ketua">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">


    <label class="block text-sm font-medium mb-1">Wakil Ketua</label>
    <input type="text" name="wakil_ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Wakil Ketua">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">

    
    <label class="block text-sm font-medium mb-1">Sekretaris</label>
    <input type="text" name="sekretaris" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Sekretaris">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">

    
    <label class="block text-sm font-medium mb-1">Bendahara</label>
    <input type="text" name="bendahara" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Bendahara">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">

    
    <div>
        <label class="block text-sm font-medium mb-1">Divisi</label>
        <select class="w-full p-3 border rounded-lg">
            <option value="">Pilih</option>
            <option>DIVISI A</option>
            <option>DIVISI B</option>
            <option>DIVISI C</option>
            <option>DIVISI D</option>
        </select>
    </div>

    
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Struktur
    </button>
</form>


<h2 class="text-2xl font-bold text-gray-700 mt-10 mb-4">📋 Data Konten Struktur Organisasi</h2>
<table class="min-w-full bg-white border border-gray-300 shadow rounded-lg overflow-hidden mb-10">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b">Ketua</th>
            <th class="py-2 px-4 border-b">Wakil Ketua</th>
            <th class="py-2 px-4 border-b">Seketaris</th>
            <th class="py-2 px-4 border-b">Bendahara</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table> -- -->
<!-- resources/views/admin/konten/strukturorganisasi.blade.php -->




    <!-- Form Tambah atau Edit -->
    <form
        action="{{ isset($editStruktur) ? route('admin.struktur.update', $editStruktur->id) : route('admin.struktur.store') }}"
        method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md mb-10">
        @csrf
        @if (isset($editStruktur))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="w-full p-3 border rounded-lg" placeholder="Nama..."
                    value="{{ isset($editStruktur) ? $editStruktur->nama : '' }}" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Jabatan</label>
                <select name="jabatan" class="w-full p-3 border rounded-lg" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="Pembina"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Pembina' ? 'selected' : '' }}>
                        Pembina</option>
                    <option value="Ketua"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Ketua' ? 'selected' : '' }}>
                        Ketua</option>
                    <option value="Wakil Ketua"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil
                        Ketua
                    </option>
                    <option value="Sekretaris"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Sekretaris' ? 'selected' : '' }}>
                        Sekretaris
                    </option>
                    <option value="Sekretaris Divisi A"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Sekretaris' ? 'selected' : '' }}>
                        Sekretaris Divisi
                        A
                    </option>
                    <option value="Sekretaris Divisi B"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Sekretaris' ? 'selected' : '' }}>
                        Sekretaris Divisi
                        B
                    </option>
                    <option value="Bendahara"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara
                    </option>
                    <option value="Bendahara Divisi A"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara
                        Divisi A
                    </option>
                    <option value="Bendahara Divisi B"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara
                        Divisi
                        B
                    </option>
                    <option value="Anggota"
                        {{ isset($editStruktur) && $editStruktur->jabatan == 'Anggota' ? 'selected' : '' }}>
                        Anggota</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Foto</label>
                <input type="file" name="foto" class="w-full p-3 border rounded-lg">

                @if (isset($editStruktur) && $editStruktur->foto)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $editStruktur->foto) }}" alt="{{ $editStruktur->nama }}"
                            class="h-20 w-20 object-cover rounded-full">
                    </div>
                @endif
            </div>
        </div>

        <button type="submit"
            class="bg-{{ isset($editStruktur) ? 'yellow' : 'blue' }}-600 text-white px-6 py-3 rounded-lg shadow hover:bg-{{ isset($editStruktur) ? 'yellow' : 'blue' }}-700 mt-6">
            {{ isset($editStruktur) ? '✏️ Update Data' : '💾 Simpan Data' }}
        </button>

        @if (isset($editStruktur))
            <a href="{{ route('admin.struktur.index') }}" class="ml-4 text-blue-500 hover:underline">Batalkan Edit</a>
        @endif
    </form>

    <!-- Tabel List Data -->
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

</div> 
