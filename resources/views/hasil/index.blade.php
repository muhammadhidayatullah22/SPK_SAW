@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-0">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-2 md:gap-0">
            <h3 class="text-xl font-bold mb-2 md:mb-0">Hasil Perhitungan SAW</h3>
            <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                <button type="button" id="printTableBtn"
                    class="w-full sm:w-auto inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                    </svg>
                    Export
                </button>
                <form method="GET" action="{{ route('hasil.index') }}" class="flex items-center gap-2 w-full sm:w-auto"
                    x-data="{ open: false }">
                    <input type="hidden" name="kelas" x-ref="kelasInput" value="{{ request('kelas') }}">
                    <div class="relative w-full sm:w-auto">
                        <button type="button" @click="open = !open"
                            class="w-full sm:w-auto inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                            </svg>
                            Filter
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute mt-2 w-40 bg-white border rounded shadow z-10">
                            <a href="#" @click.prevent="$refs.kelasInput.value=''; $el.closest('form').submit(); open=false"
                                class="block px-4 py-2 hover:bg-blue-100 {{ request('kelas') == '' ? 'font-bold bg-blue-100' : '' }}">
                                Semua Kelas
                            </a>
                            @foreach($daftar_kelas as $kelas)
                                <a href="#"
                                    @click.prevent="$refs.kelasInput.value='{{ $kelas }}'; $el.closest('form').submit(); open=false"
                                    class="block px-4 py-2 hover:bg-blue-100 {{ request('kelas') == $kelas ? 'font-bold bg-blue-100' : '' }}">
                                    {{ $kelas }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b border-r">Peringkat</th>
                        <th class="py-2 px-4 border-b border-r">Nama Siswa</th>
                        <th class="py-2 px-4 border-b border-r">NIS</th>
                        <th class="py-2 px-4 border-b border-r">Kelas</th>
                        <th class="py-2 px-4 border-b">Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranking as $index => $row)
                        <tr class="hover:bg-blue-50">
                            <td class="text-center py-2 px-4 border-b border-r">{{ $index + 1 }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ $row['siswa']->nama }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ $row['siswa']->nis }}</td>
                            <td class="text-center py-2 px-4 border-b border-r">{{ $row['siswa']->kelas }}</td>
                            <td class="text-center py-2 px-4 border-b"><strong>{{ $row['skor'] }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/hasil.js') }}"></script>
@endsection