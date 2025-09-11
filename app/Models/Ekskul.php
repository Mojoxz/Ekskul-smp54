<?php
// app/Models/Ekskul.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $fillable = [
'nama',
    'deskripsi',
    'gambar',        // Tambahan
    'jam_mulai',
    'jam_selesai',
    'hari',
    'kategori',      // Tambahan
    'kapasitas',     // Tambahan
    'jumlah_anggota', // Tambahan
    'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'jam_mulai' => 'datetime:H:i',
        'jam_selesai' => 'datetime:H:i',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_ekskuls');
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }
}
