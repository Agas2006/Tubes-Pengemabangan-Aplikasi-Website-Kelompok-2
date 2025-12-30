<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    public function show($id)
    {
    $pemesanan = Pemesanan::with(['jadwal', 'dataDiri'])->findOrFail($id);

    return view('pembayaran.show', compact('pemesanan'));
    }

    public function store(Request $request, $id)
    {
        // Proses pembayaran (contoh: update status jadi Approved)
        $tiket = Pemesanan::findOrFail($id);
        $tiket->status_pembayaran = 'Approved';
        $tiket->save();

        return redirect()->route('tiket.index')->with('success', 'Pembayaran berhasil, tiket aktif');
    }


    public function proses(Request $request)
{
    $request->validate([
        'id_pemesanan' => 'required|integer',
        'bukti_transfer' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan bukti transfer ke storage
    $path = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

    // Update status pemesanan
    $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
    $pemesanan->status_pemesanan = 'verifikasi_pembayaran'; // ← status otomatis diubah
    $pemesanan->save();

    // (Opsional) Simpan path bukti transfer ke tabel pembayaran jika kamu punya

    return redirect()->route('tiket.show', $pemesanan->id_pemesanan)
                     ->with('success', 'Bukti transfer berhasil dikirim. Status: Verifikasi Pembayaran.');
}
}