<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        // Crée 20 produits aléatoires avec la factory
        Produit::factory(20)->create();

        // S'assure qu'il y a bien 3 produits à la une
        Produit::inRandomOrder()
            ->take(3)
            ->get()
            ->each(function ($produit) {
                $produit->update(['is_featured' => true]);
            });
    }
}