<x-layouts.app>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Judul -->
        <h2 class="text-3xl font-bold text-center mb-8 text-blue-700">Kelola Pemesanan</h2>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
                <h6 class="text-gray-500">Total Pemesanan</h6>
                <p class="text-2xl font-bold text-gray-800">{{ $totalPemesanan }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
                <h6 class="text-gray-500">Sudah Dibayar</h6>
                <p class="text-2xl font-bold text-green-600">{{ $totalPaid }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
                <h6 class="text-gray-500">Menunggu</h6>
                <p class="text-2xl font-bold text-yellow-500">{{ $totalPending }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
                <h6 class="text-gray-500">Dibatalkan</h6>
                <p class="text-2xl font-bold text-red-600">{{ $totalCancelled }}</p>
            </div>
        </div>

        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Tabel Pemesanan -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Nama</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Rute</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Bukti Transfer</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $order->id_pemesanan }}</td>
                            <td class="px-4 py-2">{{ $order->dataDiri->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $order->jadwal->asal ?? '-' }} → {{ $order->jadwal->tujuan ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $order->tanggal_berangkat }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-xs font-semibold
                                    @if($order->status_pembayaran=='approved') bg-green-100 text-green-700
                                    @elseif($order->status_pembayaran=='pending') bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ strtoupper($order->status_pembayaran) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                @if($order->bukti_transfer)
                                    <a href="{{ asset('storage/'.$order->bukti_transfer) }}" target="_blank"
                                       class="text-blue-600 hover:underline text-sm">Lihat Bukti</a>
                                @else
                                    <span class="text-gray-400 text-sm">Belum ada</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <!-- Ubah Jadwal -->
                                <form action="{{ route('admin.pemesanan.ubahJadwal', $order->id_pemesanan) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="date" name="tanggal_berangkat" class="border rounded px-2 py-1 text-xs" required>
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1 rounded">
                                        Ubah Jadwal
                                    </button>
                                </form>

                                <!-- Batalkan -->
                                <form action="{{ route('admin.pemesanan.batal', $order->id_pemesanan) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                                        Batalkan
                                    </button>
                                </form>

                                <!-- Hapus -->
                                <form action="{{ route('admin.pemesanan.hapus', $order->id_pemesanan) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white text-xs px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>