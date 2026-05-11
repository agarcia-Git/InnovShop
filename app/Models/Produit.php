<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    // Champs autorisés à être remplis en masse
    protected $fillable = [
        'name',
        'slug',
        'description',
        'specifications',
        'price',
        'image',
        'options',
        'is_featured',
        'availability',
    ];

    // Conversions automatiques de types
    protected $casts = [
        // options est stocké en JSON dans la BDD
        // Laravel le convertit automatiquement en tableau PHP
        'options'      => 'array',
        'is_featured'  => 'boolean',
        'availability' => 'boolean',
    ];

    // Un produit peut être dans plusieurs paniers
    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }

    // Un produit peut être dans plusieurs commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}