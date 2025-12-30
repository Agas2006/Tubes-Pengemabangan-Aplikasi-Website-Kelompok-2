<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TiketController extends Controller
{
    public function index()
{
    $tiket = Pemesanan::with(['jadwal','dataDiri'])
        ->where('status_pembayaran', 'Approved')
        ->get();

    return view('tiket.index', compact('tiket'));
}

public function show($id)
{
    $tiket = Pemesanan::with(['jadwal','dataDiri'])->findOrFail($id);

    // Buat kode tiket unik
    $kodeTiket = 'TIKET-' . str_pad($tiket->id_pemesanan, 4, '0', STR_PAD_LEFT);

    // Kirim ke view tanpa QR
    return view('detail.detail', compact('tiket', 'kodeTiket'));
}

}