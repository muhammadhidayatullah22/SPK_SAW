@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <h3 class="text-xl font-bold mb-4">Hasil Perhitungan SAW</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Peringkat</th>
                        <th class="py-2 px-4 border-b">Nama Siswa</th>
                        <th class="py-2 px-4 border-b">NIS</th>
                        <th class="py-2 px-4 border-b">Kelas</th>
                        <th class="py-2 px-4 border-b">Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranking as $index => $row)
                        <tr class="hover:bg-blue-50">
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">{{ $row['siswa']->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $row['siswa']->nis }}</td>
                            <td class="py-2 px-4 border-b">{{ $row['siswa']->kelas }}</td>
                            <td class="py-2 px-4 border-b"><strong>{{ $row['skor'] }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection