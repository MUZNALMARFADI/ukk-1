<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    
    protected $fillable = [
        'siswa_id', 
        'petugas_id',
        'spp_id',
        'tgl_bayar',
        'bulan_dibayar',
        'jumlah_bayar',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }
}