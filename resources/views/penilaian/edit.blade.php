@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Input Nilai: {{ $siswa->nama }} ({{ $siswa->nis }})</h3>
    <form action="{{ route('penilaian.update', $siswa) }}" method="POST">
        @csrf
        @foreach($kriterias as $kriteria)
        <div class="mb-3">
            <label>{{ $kriteria->nama }} ({{ ucfirst($kriteria->jenis) }})</label>
            <input type="number" step="0.01" name="nilai[{{ $kriteria->id }}]" value="{{ $existing[$kriteria->id] ?? '' }}" class="form-control" required>
        </div>
        @endforeach
        <button class="btn btn-success">Simpan Penilaian</button>
    </form>
</div>
@endsection
