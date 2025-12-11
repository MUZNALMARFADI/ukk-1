<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'nama_kelas',
        'kompetensi',
    ];

    // Relasi: 1 kelas punya banyak siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }
}
