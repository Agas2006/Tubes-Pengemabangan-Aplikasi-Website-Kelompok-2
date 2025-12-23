@extends('layouts.app')

@section('content')

<!-- HERO -->
@php
    $asal = request('asal');

    $rute = [
        'Purwokerto' => ['Semarang', 'Yogyakarta', 'Cilacap'],
        'Cilacap' => ['Purwokerto', 'Semarang'],
        'Semarang' => ['Cilacap', 'Purwokerto'],
        'Yogyakarta' => ['Purwokerto'],
    ];

    $tujuanList = $rute[$asal] ?? [];
@endphp

<section class="hero text-center">
    <div class="container">
        <h3 class="mb-4">Hallo, Lagi Mau Kemana?</h3>

        <div class="search-box mx-auto col-md-8">
            <form method="GET" class="row g-3">
                <div class="col-md-6">
                    <label>Asal</label>
                    <select name="asal" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Pilih Asal --</option>
                        @foreach ($rute as $kota => $x)
                            <option value="{{ $kota }}" {{ $asal == $kota ? 'selected' : '' }}>
                                {{ $kota }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Tujuan</label>
                    <select name="tujuan" class="form-select">
                        <option value="">-- Pilih Tujuan --</option>

                        @foreach ($tujuanList as $tujuan)
                            <option value="{{ $tujuan }}">
                                {{ $tujuan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Penumpang</label>
                    <select name="penumpang" class="form-select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-primary px-5 mt-3" type="submit">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

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

@endsection
