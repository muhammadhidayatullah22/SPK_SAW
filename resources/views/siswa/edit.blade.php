@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Siswa</h3>
    <form action="{{ route('siswa.update', $siswa) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
        </div>
        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
