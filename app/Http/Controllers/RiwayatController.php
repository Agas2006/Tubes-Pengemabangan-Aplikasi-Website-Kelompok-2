<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil semua riwayat pemesanan, urutkan terbaru
        $riwayat = Pemesanan::with('jadwal')
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim variabel $riwayat ke view
        return view('riwayat.index', compact('riwayat'));
    }

    public function riwayat()
    {
        $orders = Pemesanan::where('user_id', auth()->id())->with(['jadwal'])->get();
        return view('customer.riwayat', compact('orders'));
    }
}