@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <h3 class="text-xl font-bold mb-4">Daftar Kriteria</h3>
        <div class="inline-block mb-3">
            <button onclick="showCreateModal()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">+ Tambah Kriteria</button>
        </div>
        @if (session('success'))
        <div id="success-alert" class="mb-3 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div> @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b border-r">Nama</th>
                        <th class="py-2 px-4 border-b border-r">Bobot</th>
                        <th class="py-2 px-4 border-b border-r">Jenis</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriterias as $kriteria)
                        <tr class="hover:bg-blue-50">
                            <td class="text-center py-2 px-4 border-b border-r">{{ $kriteria->nama }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ $kriteria->bobot }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ ucfirst($kriteria->jenis) }}</td>
                            <td class="text-center py-2 px-4 border-b">
                                <button type="button"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs"
                                    onclick="showEditModal({{ $kriteria->id }}, '{{ $kriteria->nama }}', '{{ $kriteria->bobot }}', '{{ $kriteria->jenis }}')">
                                    Edit
                                </button>
                                <button type="button"
                                    class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs"
                                    onclick="showDeleteModal({{ $kriteria->id }})">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('modal.delete')
    @include('kriteria.modal-edit')
    @include('kriteria.modal-create')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    alert.remove();
                }
            }, 2000);
        });
    </script>

    <script>
        function showEditModal(id, nama, bobot, jenis) {
            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.getElementById('editForm').action = '/kriteria/' + id;

            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-bobot').value = bobot;
            document.getElementById('edit-jenis').value = jenis;
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

    <script>
        function showCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
            document.getElementById('createModal').classList.add('flex');
        }
        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('createModal').classList.remove('flex');
        }
    </script>

    <script>
        function showDeleteModal(id) {
            // Set action form sesuai id kriteria
            var form = document.getElementById('deleteForm');
            form.action = '/kriteria/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }
    </script>
@endsection