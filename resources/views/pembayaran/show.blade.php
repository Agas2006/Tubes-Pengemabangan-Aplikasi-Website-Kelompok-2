<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-6">
        <!-- Judul -->
        <h2 class="text-center text-3xl font-bold text-blue-700 mb-8">Pembayaran Tiket</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kiri: Detail Perjalanan -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-xl mx-auto">
            <h3 class="text-2xl font-bold text-blue-700 mb-6 text-center border-b pb-3">
                Detail Perjalanan
            </h3>

            <div class="space-y-3 text-gray-700">
                <p><span class="font-semibold">Nama:</span> {{ $pemesanan->dataDiri->nama }}</p>
                <p><span class="font-semibold">Rute:</span> {{ $pemesanan->jadwal->asal }} → {{ $pemesanan->jadwal->tujuan }}</p>
                <p><span class="font-semibold">Tanggal:</span> {{ $pemesanan->tanggal_berangkat }}</p>
                <p><span class="font-semibold">Jam Berangkat:</span> {{ $pemesanan->jadwal->jam_berangkat }}</p>
                <p><span class="font-semibold">Harga per Penumpang:</span> 
                    <span class="text-green-600 font-medium">
                        Rp {{ number_format($pemesanan->jadwal->harga, 0, ',', '.') }}
                    </span>
                </p>
                <p><span class="font-semibold">Jumlah Penumpang:</span> {{ $pemesanan->penumpang }}</p>
            </div>

            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                <p class="text-lg font-bold text-blue-800">
                    Total Harga: Rp {{ number_format($pemesanan->penumpang * $pemesanan->jadwal->harga, 0, ',', '.') }}
                </p>
            </div>

            <button type="button" 
                    onclick="window.history.back()" 
                    class="inline-block mt-5 px-6 py-2 rounded-full border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold transition">
                ← Kembali
            </button>
        </div>

            <!-- Kanan: Status & Upload -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-blue-600 mb-4">Status & Pembayaran</h3>

                @php
                    $status = strtoupper($pemesanan->status_pemesanan ?? 'PENDING');
                @endphp

                <p class="mb-3">
                    <span class="font-medium">Status Pemesanan:</span>
                    @if($status === 'PENDING')
                        <span class="inline-block px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">⏳ PENDING</span>
                    @elseif($status === 'VERIFIKASI_PEMBAYARAN')
                        <span class="inline-block px-4 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold">🔍 VERIFIKASI</span>
                    @elseif($status === 'SELESAI')
                        <span class="inline-block px-4 py-1 rounded-full bg-green-100 text-green-700 font-semibold">✅ SELESAI</span>
                    @else
                        <span class="inline-block px-4 py-1 rounded-full bg-gray-200 text-gray-700 font-semibold">🔔 {{ $status }}</span>
                    @endif
                </p>

                <div class="border-t my-4"></div>

                <p><span class="font-medium">Bank Tujuan:</span> BNI</p>
                <p><span class="font-medium">No. Rekening:</span> 3458198055</p>
                <p class="mb-3"><span class="font-medium">Atas Nama:</span> CV BERKAH AUTO GROUP</p>

                <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 text-sm rounded-lg p-3 mb-4">
                    Silakan transfer sesuai total harga, lalu upload bukti transfer di bawah.
                </div>

                <form action="{{ route('pembayaran.proses') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id_pemesanan }}">

                    <div>
                        <label for="bukti_transfer" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Transfer</label>
                        <input type="file" name="bukti_transfer" id="bukti_transfer" 
                               class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-blue-500 focus:border-blue-500" required>
                        <small class="text-gray-500">Format: JPG, JPEG, PNG. Maks 2MB.</small>
                    </div>

                    <button type="submit" 
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-full transition">
                        Kirim Bukti Pembayaran
                    </button>
                </form>
            </div>
        </div>

        <!-- Tombol Dashboard -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" 
               class="inline-block px-6 py-2 rounded-full border border-blue-500 text-blue-600 hover:bg-blue-50 transition">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-app-layout>