<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use Notifiable, HasFactory;
    protected $fillable = ['nama', 'nisn',  'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'pemesan_id', 'id');
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'pemesan_id', 'id');
    }
}
