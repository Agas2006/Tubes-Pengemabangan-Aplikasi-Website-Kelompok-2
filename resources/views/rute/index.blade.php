<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h3 class="text-2xl font-bold text-center text-blue-800 mb-4">Daftar Rute Perjalanan</h3>
        <p class="text-center text-gray-600 mb-8">
            Nikmati perjalanan nyaman dengan armada terbaik dan jadwal fleksibel setiap hari.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Purwokerto → Yogyakarta --}}
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-6">
                <h5 class="text-lg font-semibold text-blue-700 mb-2">Purwokerto → Yogyakarta</h5>
                <p class="text-sm text-gray-600">
                    Perjalanan menuju Kota Pelajar dengan pilihan jadwal pagi, siang, dan malam.
                    Melewati jalur utama Jawa Tengah dengan pemandangan indah, cocok untuk wisata maupun bisnis.
                </p>
            </div>

            {{-- Purwokerto → Semarang --}}
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-6">
                <h5 class="text-lg font-semibold text-blue-700 mb-2">Purwokerto → Semarang</h5>
                <p class="text-sm text-gray-600">
                    Menghubungkan Purwokerto dengan ibu kota Jawa Tengah.
                    Akses cepat ke pusat pemerintahan, bisnis, dan kuliner khas Semarang.
                </p>
            </div>

            {{-- Purwokerto → Cilacap --}}
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-6">
                <h5 class="text-lg font-semibold text-blue-700 mb-2">Purwokerto → Cilacap</h5>
                <p class="text-sm text-gray-600">
                    Rute singkat menuju kota pesisir Cilacap. Cocok untuk pekerja, pelajar, maupun wisatawan
                    yang ingin menikmati pantai selatan Jawa.
                </p>
            </div>

            {{-- Cilacap → Purwokerto --}}
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-6">
                <h5 class="text-lg font-semibold text-blue-700 mb-2">Cilacap → Purwokerto</h5>
                <p class="text-sm text-gray-600">
                    Layanan cepat dan nyaman bagi warga Cilacap menuju Purwokerto.
                    Akses mudah ke pusat pendidikan, perkantoran, dan hiburan.
                </p>
            </div>

            {{-- Semarang → Purwokerto --}}
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-6">
                <h5 class="text-lg font-semibold text-blue-700 mb-2">Semarang → Purwokerto</h5>
                <p class="text-sm text-gray-600">
                    Perjalanan dari Semarang ke Purwokerto dengan armada modern.
                    Cocok untuk urusan bisnis maupun liburan keluarga.
                </p>
            </div>

            {{-- Semarang → Cilacap --}}
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-6">
                <h5 class="text-lg font-semibold text-blue-700 mb-2">Semarang → Cilacap</h5>
                <p class="text-sm text-gray-600">
                    Rute penting yang menghubungkan Semarang dengan Cilacap.
                    Memberikan pengalaman perjalanan efisien dan nyaman setiap hari.
                </p>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('home') }}"
               class="inline-block border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-6 py-2 rounded-lg font-semibold transition">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-app-layout>