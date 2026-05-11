<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    public function run(): void
    {
        // Crée entre 1 et 5 commandes par utilisateur
        User::all()->each(function ($user) {
            Commande::factory(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}