<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    protected $table = 'data_diri';
    protected $primaryKey = 'id_data_diri';

    protected $fillable = [
        'id_pemesanan',
        'nama',
        'alamat_penjemputan',
        'alamat_tujuan'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    public function dataDiri()
    {
    return $this->belongsTo(DataDiri::class, 'id_data_diri');
    }
}

