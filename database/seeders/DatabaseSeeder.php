<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // L'ordre est important !
        // Users en premier car Paniers et Commandes en ont besoin
        $this->call([
            UserSeeder::class,
            ProduitSeeder::class,
            PanierSeeder::class,
            CommandeSeeder::class,
        ]);
    }
}