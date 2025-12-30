<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;


class EtiketController extends Controller
{
    public function show($id)
 {
        // Ambil tiket berdasarkan id
        $tiket = Pemesanan::with(['jadwal','dataDiri'])->findOrFail($id);

        // Buat kode tiket unik
        $kodeTiket = 'TIKET-' . str_pad($tiket->id_pemesanan, 4, '0', STR_PAD_LEFT);

        // Kirim ke view
        return view('detail.detail', compact('tiket', 'kodeTiket'));
    }

}