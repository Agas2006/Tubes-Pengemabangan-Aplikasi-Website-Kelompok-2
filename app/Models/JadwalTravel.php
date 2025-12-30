<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalTravel extends Model
{
    protected $table = 'jadwal_travel';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'asal',
        'tujuan',
        'jam_berangkat',
        'harga',
        'tanggal'
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_jadwal');
    }
}
