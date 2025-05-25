@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <h3 class="text-2xl font-semibold mb-6">Tambah Siswa</h3>
        <form action="{{ route('siswa.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="nama"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">NIS</label>
                <input type="text" name="nis"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Kelas</label>
                <input type="text" name="kelas"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">Simpan</button>
        </form>
    </div>
@endsection