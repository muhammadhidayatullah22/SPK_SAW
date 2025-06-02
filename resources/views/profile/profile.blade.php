@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Profil Pengguna</h1>
    @if(session('success'))
    <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Berhasil!</strong>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Gagal!</strong>
        {{ session('error') }}
    </div>
    @endif    
    <!-- Tampilkan Foto Profil -->
    <div class="mb-6 flex justify-center">
        <img alt="Foto Profil" class="w-32 h-32 rounded-full ring ring-offset-2 ring-primary cursor-pointer" height="128" id="openProfileImageModal" width="128"/>
    </div>

    <form action="{{ route('profile.update') }}" class="space-y-5" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700" for="name">Nama:</label>
            <input class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="name" required="" type="text" value="{{ auth()->user()->name }}"/>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700" for="username">username:</label>
            <input class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="username" required="" type="username" value="{{ auth()->user()->username }}"/>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700" for="image">Foto Profil:</label>
            <input class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" name="image" type="file"/>
        </div>
        <button class="w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">Simpan Perubahan</button>
    </form>

    <!-- Tombol buka modal -->
    <button onclick="showResetPasswordModal()"
    class="w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 mt-4">
    Ubah Kata Sandi
    </button>

    
</div>
@include('profile.modal-reset')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                var alert = document.getElementById('success-alert');
                var errorAlert = document.getElementById('error-alert');
                if (alert) {
                    alert.remove();
                }
                if (errorAlert) {
                    errorAlert.remove();
                }
            }, 2000);
        });
    </script>

    <script>
        function showResetPasswordModal() {
            document.getElementById('resetPasswordModal').classList.remove('hidden');
            document.getElementById('resetPasswordModal').classList.add('flex');
        }

        function closeResetPasswordModal() {
            document.getElementById('resetPasswordModal').classList.remove('flex');
            document.getElementById('resetPasswordModal').classList.add('hidden');
        }

        // Auto-close alert
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let alert = document.getElementById('success-alert');
                let errorAlert = document.getElementById('error-alert');
                if (alert) alert.remove();
                if (errorAlert) errorAlert.remove();
            }, 2000);
        });
    </script>


@endsection
