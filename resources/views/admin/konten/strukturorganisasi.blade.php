<div class="p-8">

    @if (session('successstruktur'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span>{{ session('successstruktur') }}</span>
        </div>
    @endif
    <h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Struktur Organisasi</h2>

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
