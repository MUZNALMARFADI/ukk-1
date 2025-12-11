<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = ['siswa_id', 'jumlah_bayar', 'tgl_bayar'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
