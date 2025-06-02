@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <h3 class="text-xl font-bold mb-4">Input Penilaian Siswa</h3>
        @if (session('success'))
        <div class="mb-3 p-2 bg-green-100 text-green-800 rounded" id="success-alert">{{ session('success') }}</div> @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b border-r">Nama Siswa</th>
                        <th class="py-2 px-4 border-b border-r">NIS</th>
                        <th class="py-2 px-4 border-b border-r">Kelas</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                        <tr class="hover:bg-blue-50">
                            <td class="text-center py-2 px-4 border-b border-r">{{ $siswa->nama }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ $siswa->nis }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ $siswa->kelas }}</td>
                            <td class="text-center py-2 px-4 border-b">
                                <button onclick="showCreateModal({{ $siswa->id }})"
                                    class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">+
                                    Input Nilai</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalContainer">
        {{-- Konten modal akan dimasukkan di sini --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    alert.remove();
                }
            }, 2000);
        });
    </script>

    <script>
        function showCreateModal(siswaId) {
            // Lakukan permintaan AJAX
            fetch(`/penilaian/${siswaId}/edit-modal`)
                .then(response => response.text())
                .then(html => {
                    // Masukkan konten modal ke dalam container
                    document.getElementById('modalContainer').innerHTML = html;
                    // Tampilkan modal
                    document.getElementById('createModal').classList.remove('hidden');
                    document.getElementById('createModal').classList.add('flex');

                    // Tambahkan event listener untuk tombol tutup modal
                    document.querySelector('#createModal button[onclick="closeCreateModal()"]').addEventListener('click', closeCreateModal);

                    // Temukan form di dalam modal dan tambahkan event listener submit
                    const form = document.querySelector('#createModal form');
                    if (form) {
                        form.addEventListener('submit', function (event) {
                            // Opsional: Tangani submit form via AJAX agar modal tidak tertutup
                            // dan halaman tidak refresh
                            // event.preventDefault();
                            // ... logika submit AJAX ...
                        });
                    }
                })
                .catch(error => {
                    console.error('Error loading modal:', error);
                    // Tangani error (misalnya tampilkan pesan)
                });
        }

        function closeCreateModal() {
            const modal = document.getElementById('createModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                // Opsional: Hapus konten modal setelah ditutup
                // document.getElementById('modalContainer').innerHTML = '';
            }
        }
    </script>

@endsection