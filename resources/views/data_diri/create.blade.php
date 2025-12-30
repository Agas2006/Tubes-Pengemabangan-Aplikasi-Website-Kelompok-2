<x-app-layout>
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-6">
        <div class="max-w-3xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-blue-800">Data Diri Penumpang</h2>
                <p class="text-gray-700 mt-2">Lengkapi data diri untuk melanjutkan pemesanan tiket kamu.</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('data_diri.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pemesanan" value="{{ $id_pemesanan }}">

                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control w-full" required>
                    </div>

                    <!-- Alamat Penjemputan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Penjemputan</label>
                        <textarea name="alamat_penjemputan" rows="3" class="form-control w-full" required></textarea>
                    </div>

                    <!-- Alamat Tujuan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Tujuan</label>
                        <textarea name="alamat_tujuan" rows="3" class="form-control w-full" required></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-between items-center mt-6">
                        <button type="button" 
                                onclick="window.history.back()" 
                                class="inline-block mt-5 px-6 py-2 rounded-full border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold transition">
                            ← Kembali
                        </button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
                            Lanjut →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>