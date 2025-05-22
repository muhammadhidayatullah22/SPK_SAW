@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <h3 class="text-xl font-bold mb-4">Daftar Kriteria</h3>
        <a href="{{ route('kriteria.create') }}"
            class="inline-block mb-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">+ Tambah
            Kriteria</a>
        @if (session('success'))
        <div class="mb-3 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div> @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Bobot</th>
                        <th class="py-2 px-4 border-b">Jenis</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriterias as $kriteria)
                        <tr class="hover:bg-blue-50">
                            <td class="py-2 px-4 border-b">{{ $kriteria->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $kriteria->bobot }}</td>
                            <td class="py-2 px-4 border-b">{{ ucfirst($kriteria->jenis) }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('kriteria.edit', $kriteria) }}"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">Edit</a>
                                <form action="{{ route('kriteria.destroy', $kriteria) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs"
                                        onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection