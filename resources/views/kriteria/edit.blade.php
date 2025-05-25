@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <h3 class="text-2xl font-semibold mb-6">Edit Kriteria</h3>
        <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Kriteria</label>
                <input type="text" name="nama"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $kriteria->nama }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Bobot</label>
                <input type="number" step="0.01" name="bobot"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $kriteria->bobot }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Jenis</label>
                <select name="jenis"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="benefit" @selected($kriteria->jenis == 'benefit')>Benefit</option>
                    <option value="cost" @selected($kriteria->jenis == 'cost')>Cost</option>
                </select>
            </div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">Update</button>
        </form>
    </div>
@endsection