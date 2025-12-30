<x-app-layout>
    <div class="container py-6">
        <h2 class="text-2xl font-bold text-blue-800 mb-2 text-center">Riwayat Pemesanan</h2>
        <p class="text-center text-gray-600 mb-6">Semua perjalanan yang pernah kamu pesan akan tampil di sini.</p>

        @if($riwayat->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada riwayat pemesanan.
            </div>
        @else
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="table-auto w-full text-sm text-left">
                    <thead class="bg-blue-50 text-blue-800 font-semibold">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Rute</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Jam</th>
                            <th class="px-4 py-2">Penumpang</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Dipesan Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $r)
                        <tr class="border-b hover:bg-blue-50">
                            <td class="px-4 py-2">{{ $r->id_pemesanan }}</td>
                            <td class="px-4 py-2">{{ $r->jadwal->asal }} → {{ $r->jadwal->tujuan }}</td>
                            <td class="px-4 py-2">{{ $r->tanggal_berangkat }}</td>
                            <td class="px-4 py-2">{{ $r->jadwal->jam_berangkat }}</td>
                            <td class="px-4 py-2">{{ $r->penumpang }}</td>
                            <td class="px-4 py-2">
                                @if($r->status_pembayaran == 'approved')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">Disetujui</span>
                                @elseif($r->status_pembayaran == 'pending')
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Menunggu</span>
                                @elseif($r->status_pembayaran == 'rejected')
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">Dibatalkan</span>
                                @else
                                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full">Verifikasi</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $r->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center mt-6">
            <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-app-layout>