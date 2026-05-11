<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    // Champs autorisés à être remplis en masse
    protected $fillable = [
        'user_id',
        'products',
        'total_price',
    ];

    // Conversions automatiques de types
    protected $casts = [
        // products est stocké en JSON dans la BDD
        // Laravel le convertit automatiquement en tableau PHP
        'products'    => 'array',
        'total_price' => 'decimal:2',
    ];

    // Un panier appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}