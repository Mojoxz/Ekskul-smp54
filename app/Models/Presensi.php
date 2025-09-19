<?php
// app/Models/Presensi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ekskul_id',
        'tanggal',
        'jam',
        'status',
        'keterangan',
        'foto_presensi', // Add this field
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }

    // Accessor untuk mendapatkan URL foto presensi
    public function getFotoPresensiUrlAttribute()
    {
        if ($this->foto_presensi) {
            return asset('storage/' . $this->foto_presensi);
        }
        return null;
    }
}   