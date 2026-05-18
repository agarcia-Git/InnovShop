<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Champs autorisés à être remplis en masse
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'address',
        'role',
    ];

    // Champs cachés (jamais affichés dans les réponses)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Conversions automatiques de types
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Un utilisateur a plusieurs commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    // Vérifie si l'utilisateur est administrateur
    public function isAdmin(): bool
    {
    return $this->role === 'admin';
    }

    // Un utilisateur a un seul panier
    public function panier()
    {
        return $this->hasOne(Panier::class);
    }


}