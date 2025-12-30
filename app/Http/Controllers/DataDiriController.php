<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri; // ← tambahkan titik koma di sini

class DataDiriController extends Controller
{
    public function create($id_pemesanan)
{
    return view('data_diri.create', compact('id_pemesanan'));
}

public function store(Request $request)
{
    $request->validate([
        'id_pemesanan' => 'required|integer',
        'nama' => 'required|string|max:255',
        'alamat_penjemputan' => 'required|string',
        'alamat_tujuan' => 'required|string',
    ]);

    DataDiri::create($request->only([
        'id_pemesanan','nama','alamat_penjemputan','alamat_tujuan'
    ]));

    return redirect()->route('pembayaran.show', $request->id_pemesanan);
}

}