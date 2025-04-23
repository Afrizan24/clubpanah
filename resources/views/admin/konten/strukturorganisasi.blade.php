<!-- Struktur Organisasi Klub Panah -->

<h2 class="text-2xl font-bold text-gray-700 mb-4">🏹 Struktur Organisasi</h2>

<form id="strukturForm">
    <!-- Ketua -->
    <label class="block text-sm font-medium mb-1">Ketua</label>
    <input type="text" name="ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Ketua">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">

    <!-- Wakil Ketua -->
    <label class="block text-sm font-medium mb-1">Wakil Ketua</label>
    <input type="text" name="wakil_ketua" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Wakil Ketua">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">
    
    <!-- Sekretaris -->
    <label class="block text-sm font-medium mb-1">Sekretaris</label>
    <input type="text" name="sekretaris" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Sekretaris">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">
    
    <!-- Bendahara -->
    <label class="block text-sm font-medium mb-1">Bendahara</label>
    <input type="text" name="bendahara" class="w-full p-3 border rounded-lg mb-4" placeholder="Nama Bendahara">
    <input id="" type="file" class="w-full p-3 border rounded-lg" placeholder="https://...">
    
    <!-- Divisi -->
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
    
    <!-- Tombol Simpan -->
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 Simpan Struktur
    </button>
</form>


<!-- TABEL OUTPUT -->
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
</table>
