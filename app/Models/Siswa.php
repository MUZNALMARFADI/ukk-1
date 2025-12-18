<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama',
        'tingkat',
        'jurusan',
        'alamat',
        'telepon',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Tambahkan method untuk mendapatkan nama kelas lengkap
    public function getNamaKelasAttribute()
    {
        return $this->tingkat . ' ' . $this->jurusan;
    }

    // Relasi ke pembayaran
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}