<x-app-layout>
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-6">
        <div class="container text-center"> {{-- Tambahkan text-center di sini --}}
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Tiket Saya</h2>
            <p class="text-gray-600 mb-6">Berikut daftar tiket aktif yang sudah kamu pesan.</p>
        </div>

        <div class="container">
            @forelse($tiket as $item)
                <div class="bg-white rounded-lg shadow-md mb-4 p-4 flex justify-between items-center hover:shadow-lg transition">
                    <div>
                        <h5 class="font-semibold text-lg text-blue-700">
                            {{ optional($item->jadwal)->asal }} → {{ optional($item->jadwal)->tujuan }}
                        </h5>
                        <p class="text-sm text-gray-600">
                            Tanggal: {{ $item->tanggal_berangkat }} | Jam: {{ optional($item->jadwal)->jam_berangkat }}
                        </p>
                        <p class="text-sm text-gray-600">Penumpang: {{ $item->penumpang }}</p>

                        <span class="inline-block mt-2 px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                            Tiket Aktif
                        </span>
                    </div>
                    <div>
                        <a href="{{ route('tiket.show', $item->id_pemesanan) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                            Detail →
                        </a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    Belum ada tiket yang aktif.
                </div>
            @endforelse

            <div class="text-center mt-6">
            <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
                ← Kembali ke Dashboard
            </a>
        </div>
        </div>
    </div>
</x-app-layout>