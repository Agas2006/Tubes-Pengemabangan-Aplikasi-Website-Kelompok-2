<x-app-layout>
    <div class="container py-6">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Pilih Jadwal Perjalanan</h2>

        @if($jadwal->isEmpty())
            <div class="alert alert-warning text-center">
                Jadwal tidak ditemukan.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($jadwal as $j)
                    <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
                        <h5 class="font-semibold text-lg text-blue-700">
                            {{ $j->asal }} → {{ $j->tujuan }}
                        </h5>
                        <p class="text-sm text-gray-600">Jam: <b>{{ $j->jam_berangkat }}</b></p>
                        <p class="text-sm text-gray-600">Tanggal: {{ request('tanggal_berangkat') }}</p>
                        <p class="text-sm text-gray-600">Harga: <b>Rp {{ number_format($j->harga,0,',','.') }}</b></p>

                        <form action="{{ route('pemesanan.store') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="id_jadwal" value="{{ $j->id_jadwal }}">
                            <input type="hidden" name="tanggal_berangkat" value="{{ request('tanggal_berangkat') }}">
                            <input type="hidden" name="penumpang" value="{{ request('penumpang') }}">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg w-full">
                                Pilih Jadwal
                            </button>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">
                                ← Kembali
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>