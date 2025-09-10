<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'kelas',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ekskuls()
    {
        return $this->belongsToMany(Ekskul::class, 'user_ekskuls');
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMurid()
    {
        return $this->role === 'murid';
    }
}
