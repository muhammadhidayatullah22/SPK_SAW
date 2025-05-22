@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Kriteria</h3>
    <form action="{{ route('kriteria.update', $kriteria) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kriteria</label>
            <input type="text" name="nama" class="form-control" value="{{ $kriteria->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Bobot</label>
            <input type="number" step="0.01" name="bobot" class="form-control" value="{{ $kriteria->bobot }}" required>
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="benefit" @selected($kriteria->jenis == 'benefit')>Benefit</option>
                <option value="cost" @selected($kriteria->jenis == 'cost')>Cost</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
