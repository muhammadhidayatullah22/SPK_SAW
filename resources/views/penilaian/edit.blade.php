<div id="createModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-xl p-6">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h3 class="text-xl font-semibold text-gray-800">
                Input Nilai: {{ $siswa->nama }} ({{ $siswa->nis }})
            </h3>
            <button onclick="closeCreateModal()" class="text-gray-500 hover:text-red-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form action="{{ route('penilaian.update', $siswa) }}" method="POST" class="space-y-4">
            @csrf
            @foreach($kriterias as $kriteria)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        {{ $kriteria->nama }} <span class="text-xs text-gray-500">({{ ucfirst($kriteria->jenis) }})</span>
                    </label>
                    <input
                        type="number"
                        step="0.01"
                        name="nilai[{{ $kriteria->id }}]"
                        value="{{ $existing[$kriteria->id] ?? '' }}"
                        class="w-full inline-block px-2 py-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                </div>
            @endforeach

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
