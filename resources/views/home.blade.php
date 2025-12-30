<x-app-layout>

@php
    $rute = [
        'Purwokerto' => ['Yogyakarta', 'Semarang', 'Cilacap'],
        'Cilacap' => ['Purwokerto', 'Semarang'],
        'Yogyakarta' => ['Purwokerto'],
        'Semarang' => ['Cilacap', 'Purwokerto'],
    ];
@endphp

<section class="hero text-center">
    <div class="container">
        <h3 class="mb-4">Hallo, Lagi Mau Kemana?</h3>

        <div class="search-box mx-auto col-md-8">
            <form method="GET" action="{{ route('jadwal.index') }}" class="row g-3">

                {{-- ASAL --}}
                <div class="col-md-6">
                    <label>Asal</label>
                    <select name="asal" id="asal" class="form-select" required>
                        <option value="">-- Pilih Asal --</option>
                        @foreach ($rute as $kota => $x)
                            <option value="{{ $kota }}">{{ $kota }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- TUJUAN --}}
                <div class="col-md-6">
                    <label>Tujuan</label>
                    <select name="tujuan" id="tujuan" class="form-select" required>
                        <option value="">-- Pilih Tujuan --</option>
                    </select>
                </div>

                {{-- TANGGAL & PENUMPANG --}}
                <div class="col-md-6">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal_berangkat" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label>Jumlah Penumpang</label>
                    <select name="penumpang" class="form-select" required>
                        <option value="" disabled selected>Pilih jumlah</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                {{-- BUTTON --}}
                <div class="col-12 text-center">
                    <button class="btn btn-primary px-5 mt-3">
                        Cari Jadwal
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

{{-- JAVASCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const asal = document.getElementById('asal');
    const tujuan = document.getElementById('tujuan');
    const rute = @json($rute);

    asal.addEventListener('change', function () {
        tujuan.innerHTML = '<option value="">-- Pilih Tujuan --</option>';

        if (rute[this.value]) {
            rute[this.value].forEach(t => {
                const opt = document.createElement('option');
                opt.value = t;
                opt.textContent = t;
                tujuan.appendChild(opt);
            });
        }
    });
});
</script>

<!-- RUTE -->
<section class="section-blue text-center">
    <div class="container">
        <h4 class="mb-3">Nikmati perjalanan nyaman dan tepat waktu</h4>
        <p>Travel dengan armada terbaik di Purwokerto</p>

        <div class="row mt-4">
            <div class="col-md-3">Purwokerto → Cilacap</div>
            <div class="col-md-3">Purwokerto → Semarang</div>
            <div class="col-md-3">Purwokerto → Yogyakarta</div>
            <div class="col-md-3">Cilacap → Semarang</div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">Cilacap → Purwokerto</div>
            <div class="col-md-3">Semarang → Purwokerto</div>
            <div class="col-md-3">Yogyakarta → Purwokerto</div>
            <div class="col-md-3">Semarang → Cilacap</div>
        </div>
    </div>
</section>

<!-- ARMADA -->
<section class="armada py-5">
    <div class="container text-center">
        <h3 class="mb-4">ARMADA KAMI</h3>

        <div class="row">
             <div class="col-md-4">
                <img src="image/xpander.jpg">
                <h6 class="mt-2">Xpander</h6>
                <p>Kapasitas 6 Penumpang</p>
            </div>
            <div class="col-md-4">
                <img src="image/zenix.jpg">
                <h6 class="mt-2">Innova Zenix</h6>
                <p>Kapasitas 6 Penumpang</p>
            </div>
            <div class="col-md-4">
                <img src="image/innovareborn.jpg">
                <h6 class="mt-2">Innova Reborn</h6>
                <p>Kapasitas 6 Penumpang</p>
            </div>
        </div>
    </div>
</section>

</x-app-layout>
