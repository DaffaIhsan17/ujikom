<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi banyak ke banyak dengan Kantin
    public function kantins()
    {
        return $this->belongsToMany(Kantin::class, 'produk_kantin', 'produk_id', 'kantin_id', 'id');
    }
}
