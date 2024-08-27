<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Define the fillable fields if necessary
    protected $fillable = ['name', 'price', 'image'];
}
