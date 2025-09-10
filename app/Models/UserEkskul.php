<?php
// app/Models/UserEkskul.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEkskul extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ekskul_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }
}
