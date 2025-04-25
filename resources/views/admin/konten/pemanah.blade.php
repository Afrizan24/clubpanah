<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Data Anggota Pemanah</h2>

<form id="pemanahForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Kolom 1 -->
    <div>
        <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
        <input type="text" class="w-full p-3 border rounded-lg" placeholder="Nama lengkap">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
        <select class="w-full p-3 border rounded-lg">
            <option value="">Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tempat Lahir</label>
        <input type="text" class="w-full p-3 border rounded-lg" placeholder="Contoh: Jakarta">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
        <input type="date" class="w-full p-3 border rounded-lg">
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Alamat Domisili</label>
        <textarea class="w-full p-3 border rounded-lg" rows="2" placeholder="Alamat lengkap..."></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Nomor Telepon / WA</label>
        <input type="number" class="w-full p-3 border rounded-lg" placeholder="+62...">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tingkat Keahlian</label>
        <select class="w-full p-3 border rounded-lg">
            <option value="">Pilih</option>
            <option>Pemula</option>
            <option>Menengah</option>
            <option>Lanjutan</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Divisi</label>
        <select class="w-full p-3 border rounded-lg">
            <option value="">Pilih</option>
            <option>Recurve</option>
            <option>Compound</option>
            <option>Barebow</option>
            <option>Traditional</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Foto Profil (URL)</label>
        <input type="file" class="w-full p-3 border rounded-lg">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tanggal Bergabung</label>
        <input type="date" class="w-full p-3 border rounded-lg">
    </div>

    <div class="md:col-span-2">
        <button class="w-full bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-2">
            💾 Simpan Data Pemanah
        </button>
    </div>
</form>


