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
        'kelas_id',   // ← ini foreign key!
        'jurusan',
        'alamat',
        'telepon',
        'user_id',
    ];


    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // Tambahkan relasi ini
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
