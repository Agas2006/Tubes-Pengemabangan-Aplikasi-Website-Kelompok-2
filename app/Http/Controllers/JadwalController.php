<?php

namespace App\Http\Controllers;

use App\Models\JadwalTravel;
use Illuminate\Http\Request;


class JadwalController extends Controller
{
 public function index(Request $request)
{
    // Kalau belum ada input, tampilkan view kosong
    if (!$request->has(['asal','tujuan','tanggal_berangkat'])) {
        return view('jadwal.index', ['jadwal' => collect()]);
    }

    // Validasi input
    $request->validate([
        'asal' => 'required',
        'tujuan' => 'required',
        'tanggal_berangkat' => 'required|date',
    ]);

    // Query jadwal sesuai input
    $jadwal = JadwalTravel::where('asal', $request->asal)
        ->where('tujuan', $request->tujuan)
        ->get();

    return view('jadwal.index', compact('jadwal'));
}
}
