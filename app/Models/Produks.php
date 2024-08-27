<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    // Explicitly define the table name
    protected $table = 'produks';
    
    // Define the fillable fields if necessary
    protected $guarded = 'id';
}