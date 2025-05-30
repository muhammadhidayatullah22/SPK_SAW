@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <h3 class="text-xl font-bold mb-4">Daftar User</h3>
        <a href="{{ route('user.create') }}"
            class="inline-block mb-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">+ Tambah
            User</a>
        @if (session('success'))
        <div id="success-alert" class="mb-3 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div> @endif
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b border-r">Nama</th>
                        <th class="py-2 px-4 border-b border-r">Username</th>
                        <th class="py-2 px-4 border-b border-r">Role</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-blue-50">
                            <td class="text-center px-4 py-2 border-b border-r">{{ $user->name }}</td>
                            <td class="text-center px-4 py-2 border-b border-r">{{ $user->username }}</td>
                            <td class="text-center px-4 py-2 border-b border-r">{{ $user->role }}</td>
                            <td class="text-center px-4 py-2 border-b">
                                <a href="{{ route('user.edit', $user) }}"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">Edit</a>
                                <button type="button"
                                    class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs"
                                    onclick="showDeleteModal({{ $user->id }})">
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
        function showDeleteModal(id) {
            var form = document.getElementById('deleteForm');
            form.action = '/user/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }
    </script>

@endsection