<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;

    protected $fillable = [

        'jadwal_penjadwalan'
    ];

    public function status_penjadwalan()
    {
        return $this->belongsTo(StatusPenjadwalan::class, 'id_status', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
