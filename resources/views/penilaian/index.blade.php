@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <h3 class="text-xl font-bold mb-4">Input Penilaian Siswa</h3>
        @if (session('success'))
        <div class="mb-3 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div> @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Nama Siswa</th>
                        <th class="py-2 px-4 border-b">NIS</th>
                        <th class="py-2 px-4 border-b">Kelas</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                        <tr class="hover:bg-blue-50">
                            <td class="py-2 px-4 border-b">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $siswa->nis }}</td>
                            <td class="py-2 px-4 border-b">{{ $siswa->kelas }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('penilaian.edit', $siswa) }}"
                                    class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs">Input
                                    Nilai</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection