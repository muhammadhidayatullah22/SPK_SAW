@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <h3 class="text-2xl font-semibold mb-6">Input Nilai: {{ $siswa->nama }} ({{ $siswa->nis }})</h3>
        <form action="{{ route('penilaian.update', $siswa) }}" method="POST" class="space-y-5">
            @csrf
            @foreach($kriterias as $kriteria)
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">{{ $kriteria->nama }}
                        ({{ ucfirst($kriteria->jenis) }})</label>
                    <input type="number" step="0.01" name="nilai[{{ $kriteria->id }}]"
                        value="{{ $existing[$kriteria->id] ?? '' }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            @endforeach
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">Simpan
                Penilaian</button>
        </form>
    </div>
@endsection