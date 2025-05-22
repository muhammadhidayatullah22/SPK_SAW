@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Kriteria</h3>
    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kriteria</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Bobot</label>
            <input type="number" step="0.01" name="bobot" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
