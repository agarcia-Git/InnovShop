<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

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

    protected $casts = [
        'options'      => 'array',
        'is_featured'  => 'boolean',
        'availability' => 'boolean',
    ];

    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}