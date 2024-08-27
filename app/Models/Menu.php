<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Jika hubungan adalah satu kantin memiliki banyak menu
    public function kantin()
    {
        return $this->belongsTo(Kantin::class, 'kantin_id', 'id');
    }
    
    // Jika hubungan adalah banyak ke banyak, tetap gunakan belongsToMany
    public function kantins()
    {
        return $this->belongsToMany(Kantin::class, 'kantin_menu');
    }
}
