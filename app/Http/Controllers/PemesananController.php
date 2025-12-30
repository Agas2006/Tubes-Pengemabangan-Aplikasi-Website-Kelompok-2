<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Pemesanan;
use App\Models\JadwalTravel;

class PemesananController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_jadwal' => 'required|integer',
            'tanggal_berangkat' => 'required|date',
            'penumpang' => 'required|integer|min:1'
        ]);

        // Simpan data pemesanan (sekali saja)
        $pemesanan = Pemesanan::create([
            'user_id' => auth()->id(), // wajib biar tiket muncul di Etiket
            'id_jadwal' => $request->id_jadwal,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'penumpang' => $request->penumpang,
            'status_pembayaran' => 'pending', // default awal
        ]);

        // Redirect ke form data diri
        return redirect()->route('data_diri.create', $pemesanan->id_pemesanan)
                         ->with('success', 'Pemesanan berhasil dibuat.');
    }
}