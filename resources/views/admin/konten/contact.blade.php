<h2 class="text-2xl font-bold mb-4">Daftar Pesan Masuk</h2>

{{-- 1. Tampilkan pesan sukses jika ada --}}
@if(session('success'))
    <div class="text-green-600 mb-4">{{ session('success') }}</div>
@endif

{{-- 2. Tabel daftar pesan --}}
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">No</th>
                <th class="border px-4 py-2 text-left">Nama</th>
                <th class="border px-4 py-2 text-left">Email</th>
                <th class="border px-4 py-2 text-left">Pesan</th>
                <th class="border px-4 py-2 text-left">Waktu</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesans as $pesan)
                <tr class="hover:bg-gray-50">
                    {{-- 3. Nomor urut berdasarkan halaman --}}
                    <td class="border px-4 py-2">
                        {{ ($pesans->currentPage() - 1) * $pesans->perPage() + $loop->iteration }}
                    </td>
                    <td class="border px-4 py-2">{{ $pesan->nama }}</td>
                    <td class="border px-4 py-2">{{ $pesan->email }}</td>
                    <td class="border px-4 py-2">{{ $pesan->pesan }}</td>
                    <td class="border px-4 py-2">{{ $pesan->created_at->format('d M Y H:i') }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex flex-col md:flex-row justify-center gap-2">
                            {{-- 4. Tombol Balas atau indikator sudah dibalas --}}
                            @if(!$pesan->is_replied)
                                <button 
                                    onclick="openModal('{{ $pesan->id }}', '{{ $pesan->email }}')" 
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                                    Balas
                                </button>
                            @else
                                <span class="text-gray-500 text-sm">Sudah Dibalas</span>
                            @endif

                            {{-- 5. Tombol Hapus dengan konfirmasi custom --}}
                            <button 
                                type="button"
                                onclick="confirmDelete({{ $pesan->id }})"
                                data-id="{{ $pesan->id }}"
                                data-url="{{ route('admin.pesan.destroy', $pesan->id) }}"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                Hapus
                            </button>
                        
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- 6. Navigasi Pagination --}}
@if (method_exists($pesans, 'links'))
    <div class="flex justify-center mt-4">
        {{ $pesans->links() }}
    </div>
@endif

{{-- 7. Modal Balas Pesan --}}
<div id="balasModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-lg mx-4">
        <h3 class="text-xl font-semibold mb-4">Balas Pesan</h3>
        <form method="POST" action="{{ route('admin.pesan.reply') }}">
            @csrf
            <input type="hidden" name="pesan_id" id="replyPesanId">
            <input type="hidden" name="email" id="replyEmail">
            
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium mb-1">Subjek</label>
                <input type="text" name="subject" id="subject" class="w-full border rounded p-2" required>
            </div>
            
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium mb-1">Pesan</label>
                <textarea name="message" id="message" rows="5" class="w-full border rounded p-2" required></textarea>
            </div>
            
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Kirim</button>
            </div>
        </form>
    </div>
</div>

{{-- 8. Modal Konfirmasi Hapus --}}
<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
        <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
        <p class="mb-4">Yakin ingin menghapus pesan ini?</p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
            </div>
        </form>
    </div>
</div>

{{-- 9. Script Modal Balas dan Konfirmasi --}}
<script>
    function openModal(id, email) {
        document.getElementById('replyPesanId').value = id;
        document.getElementById('replyEmail').value = email;
        const modal = document.getElementById('balasModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        const modal = document.getElementById('balasModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function confirmDelete(id) {
    const button = event.target; // tombol yang diklik
    const url = button.getAttribute('data-url'); // ambil url dari data-url
    const form = document.getElementById('deleteForm');
    form.action = url;
    
    const modal = document.getElementById('confirmModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    }


    function closeConfirmModal() {
        const modal = document.getElementById('confirmModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
