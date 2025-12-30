<x-layouts.app>
    <div class="max-w-xl mx-auto py-8 px-4 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Detail Tiket</h2>

        <div class="space-y-3 text-sm text-gray-700">
            <p><strong>Nama:</strong> {{ optional($tiket->dataDiri)->nama ?? 'Belum ada nama' }}</p>
            <p><strong>Rute:</strong> {{ optional($tiket->jadwal)->asal }} → {{ optional($tiket->jadwal)->tujuan }}</p>
            <p><strong>Tanggal:</strong> {{ $tiket->tanggal_berangkat }}</p>
            <p><strong>Jam:</strong> {{ \Carbon\Carbon::parse(optional($tiket->jadwal)->jam)->format('H:i') }}</p>
            <p><strong>Penumpang:</strong> {{ $tiket->penumpang }}</p>
            <p><strong>Status:</strong> Tiket Aktif</p>
            <p><strong>Kode Tiket:</strong> {{ $kodeTiket }}</p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('tiket.index') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                ← Kembali ke daftar tiket
            </a>
        </div>
    </div>
</x-layouts.app>