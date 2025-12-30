<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $incrementing = true;
    protected $keyType = 'int';

  protected $fillable = [
    'user_id',
    'id_jadwal',
    'tanggal_berangkat',
    'penumpang',
    'status_pembayaran',
    'bukti_transfer',
];

    // Relasi ke JadwalTravel
    public function jadwal()
    {
        return $this->belongsTo(JadwalTravel::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke DataDiri
    public function dataDiri()
    {
        return $this->hasOne(DataDiri::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan', 'id_pemesanan');
    }

}