<?php

namespace App\Models;

use Filament\Panel;
use App\Models\Kantin;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'kantin_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi ke satu kantin
    public function kantin()
    {
        return $this->belongsTo(Kantin::class, 'kantin_id', 'id');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['Admin', 'Kantin']);
    }
}
