<h2 class="text-2xl font-bold text-gray-700 mb-4">ℹ️ Informasi Layanan Klub</h2>

@if ($layanan->count() >= 1)
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
        <p class="font-bold">Informasi</p>
        <p>Data layanan utama sudah terisi. Anda hanya dapat menambah/mengupdate testimonial.</p>
    </div>
@endif

<form id="layananForm" method="POST" action="{{ route('admin.layanan.store') }}" enctype="multipart/form-data">
    @csrf

    @if ($layanan->count() < 1)
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Judul Layanan</label>
            <input type="text" name="judul" class="w-full p-3 border rounded-lg"
                placeholder="Contoh: Latihan Rutin Mingguan" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Deskripsi Layanan</label>
            <textarea name="deskripsi" class="w-full p-3 border rounded-lg" rows="3"
                placeholder="Penjelasan tentang layanan..." required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Hari & Jam Operasional</label>
            <input type="text" name="hari_jam" class="w-full p-3 border rounded-lg"
                placeholder="Contoh: Senin - Jumat, 08:00 - 10:00" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Biaya / Gratis</label>
            <input type="number" name="biaya" class="w-full p-3 border rounded-lg" placeholder="Contoh: 50000"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Lokasi Layanan</label>
            <input type="text" name="lokasi" class="w-full p-3 border rounded-lg" placeholder="Lokasi" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Kontak Layanan (WA)</label>
            <input type="text" name="kontak" class="w-full p-3 border rounded-lg" placeholder="+62..." required>
        </div>
    @else
        <input type="hidden" name="update_mode" value="testimonial_only">
    @endif

    <div class="border-t-2 border-gray-200 my-6 pt-6">
        <h3 class="text-lg font-semibold mb-4">➕ Tambah Testimonial</h3>

        @if ($testimonials->count() >= 3)
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
                <p class="font-bold">Perhatian</p>
                <p>Anda sudah memiliki 3 testimonial. Testimonial baru akan menggantikan yang paling lama.</p>
            </div>
        @endif

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Testimonial</label>
            <input type="text" name="nama" class="w-full p-3 border rounded-lg" placeholder="Nama Lengkap"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Jabatan Testimonial</label>
            <input type="text" name="jabatan" class="w-full p-3 border rounded-lg" placeholder="Jabatan" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Isi Pesan</label>
            <input type="text" name="isi" class="w-full p-3 border rounded-lg" placeholder="Isi Pesan" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Foto Testimonial</label>
            <input type="file" name="foto" class="w-full p-3 border rounded-lg" required>
        </div>
    </div>

    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 mt-4">
        💾 {{ $layanan->count() >= 1 ? 'Simpan Testimonial' : 'Simpan Informasi Layanan' }}
    </button>
</form>

<!-- ==================================== -->
<!-- TABEL OUTPUT INFORMASI LAYANAN -->
<!-- ==================================== -->
<h2 class="text-2xl font-bold text-gray-700 mt-10 mb-4">📋 Data Konten Layanan</h2>

@if ($layanan->count() > 0)
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-3">Informasi Layanan Utama</h3>
        <table class="min-w-full bg-white border border-gray-300 shadow rounded-lg overflow-hidden mb-10">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="py-2 px-4 border-b">Judul Layanan</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Hari & Jam</th>
                    <th class="py-2 px-4 border-b">Biaya</th>
                    <th class="py-2 px-4 border-b">Lokasi</th>
                    <th class="py-2 px-4 border-b">Kontak</th>
                    <th class="py-2 px-4 border-b">Action</th> <!-- Menambahkan kolom Action -->
                </tr>
            </thead>
            <tbody>
                @foreach ($layanan as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->judul }}</td>
                        <td class="py-2 px-4 border-b">{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->hari_jam }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ $item->biaya ? 'Rp' . number_format($item->biaya, 0, ',', '.') : 'Gratis' }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->lokasi }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->kontak }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.layanan.edit', $item->id) }}"
                                class="text-blue-500 hover:text-blue-700 font-semibold">Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<!-- Testimonial -->
@if ($testimonials->count() > 0)
    <div>
        <h3 class="text-xl font-semibold mb-3">Testimonial ({{ $testimonials->count() }}/3)</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($testimonials as $testimonial)
                <div class="border rounded-lg p-4 shadow">
                    <div class="flex items-center mb-3">
                        @if ($testimonial->foto)
                            <img src="{{ asset('storage/' . $testimonial->foto) }}" alt="{{ $testimonial->nama }}"
                                class="w-12 h-12 rounded-full object-cover mr-3">
                        @endif
                        <div>
                            <h4 class="font-semibold">{{ $testimonial->nama }}</h4>
                            <p class="text-sm text-gray-600">{{ $testimonial->jabatan }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"{{ $testimonial->isi }}"</p>
                    <form action="{{ route('admin.layanan.deleteTestimonial', $testimonial->id) }}" method="POST"
                        class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                            Hapus Testimonial
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endif

<!-- =========================== -->
<!-- ✍️ FORM EDIT PROFIL CLUB -->
<!-- =========================== -->
<div class="mt-10">
    <h2 class="text-2xl font-bold text-gray-700 mb-4">🏷️ Profil Klub</h2>

    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow">
        @csrf
        <input type="hidden" name="update_mode" value="update_profile">

        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium mb-1">Logo Klub</label>
            <input type="file" name="logo" class="w-full p-3 border rounded-lg">
            @if (isset($profile) && $profile->logo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo"
                        class="w-24 h-auto rounded border">
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium mb-1">Deskripsi Klub</label>
            <textarea id="description" name="description" class="w-full p-3 border rounded-lg" rows="4"
                placeholder="Deskripsi singkat tentang klub...">{{ old('description', $profile->description ?? '') }}</textarea>
        </div>

        <button type="submit"
            class="bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition-colors">
            💾 Simpan Profil
        </button>
    </form>
</div>
