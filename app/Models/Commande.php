<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // Champs autorisés à être remplis en masse
    protected $fillable = [
        'user_id',
        'products',
        'total_price',
        'status',
        'shipping_address',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
    ];

    // Conversions automatiques de types
    protected $casts = [
        // products est stocké en JSON dans la BDD
        // Laravel le convertit automatiquement en tableau PHP
        'products'    => 'array',
        'total_price' => 'decimal:2',
    ];

    // Une commande appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}