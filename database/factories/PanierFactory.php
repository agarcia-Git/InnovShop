<?php

namespace Database\Factories;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PanierFactory extends Factory
{
    public function definition(): array
    {
        // Récupère des produits aléatoires existants
        $produits = Produit::inRandomOrder()
            ->take(rand(1, 5))
            ->get()
            ->map(function ($produit) {
                return [
                    'product_id' => $produit->id,
                    'name'       => $produit->name,
                    'price'      => $produit->price,
                ];
            })->toArray();

        // Calcule le total
        $total = array_sum(array_column($produits, 'price'));

        return [
            'user_id'     => User::inRandomOrder()->first()->id,
            'products'    => $produits,
            'total_price' => $total,
        ];
    }
}