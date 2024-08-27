<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Kantin extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    // Relasi banyak ke banyak dengan Produk
    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'produk_kantin', 'kantin_id', 'produk_id');
    }

    // Jika satu kantin dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
