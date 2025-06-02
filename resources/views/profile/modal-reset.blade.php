<!-- Modal Reset Password -->
<div id="resetPasswordModal" class="fixed inset-0 z-50 hidden justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg relative">
        <h2 class="text-xl font-bold mb-4">Ubah Kata Sandi</h2>
        <form action="{{ route('profile.resetPassword') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1 text-sm">Kata Sandi Lama</label>
                <input type="password" name="old_password" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 text-sm">Kata Sandi Baru</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 text-sm">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeResetPasswordModal()"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
