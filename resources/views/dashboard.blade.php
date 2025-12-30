<x-app-layout>
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-6">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Hallo, Lagi Mau Kemana?</h1>
            <p class="text-gray-700 mb-6">Cari dan pesan travel dengan mudah dan cepat</p>

            <!-- FORM PENCARIAN -->
            <form method="GET" action="{{ route('jadwal.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white p-6 rounded-lg shadow">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Asal</label>
                    <select name="asal" class="form-select w-full mt-1" required>
                        <option value="">Pilih Asal</option>
                        <option value="Purwokerto">Purwokerto</option>
                        <option value="Cilacap">Cilacap</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Yogyakarta">Yogyakarta</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tujuan</label>
                    <select name="tujuan" class="form-select w-full mt-1" required>
                        <option value="">Pilih Tujuan</option>
                        <option value="Yogyakarta">Yogyakarta</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Cilacap">Cilacap</option>
                        <option value="Purwokerto">Purwokerto</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal_berangkat" class="form-input w-full mt-1" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Penumpang</label>
                    <select name="penumpang" class="form-select w-full mt-1" required>
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                        <option value="3">3 Orang</option>
                        <option value="4">4 Orang</option>
                    </select>
                </div>

                <div class="md:col-span-4 text-right mt-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
                        Cari Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MENU UTAMA -->
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-10">
    <div class="max-w-5xl mx-auto px-4">
        

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
            {{-- Kartu Cek Jadwal --}}
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-bold text-blue-700 mb-2">Rute</h3>
                <p class="text-sm text-gray-600 mb-3">Lihat beberapa pilihan rute perjalanan.</p>
                <a href="{{ route('rute.index') }}" class="text-blue-600 hover:underline text-sm">Cari Jadwal →</a>
            </div>

            {{-- Kartu Profil Akun --}}
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-bold text-green-700 mb-2">Profil Akun</h3>
                <p class="text-sm text-gray-600 mb-3">Edit nama, email, dan password kamu.</p>
                <a href="{{ route('profile.edit') }}" class="text-green-600 hover:underline text-sm">Edit Profil →</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>