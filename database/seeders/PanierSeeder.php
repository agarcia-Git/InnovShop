<?php

namespace Database\Seeders;

use App\Models\Panier;
use App\Models\User;
use Illuminate\Database\Seeder;

class PanierSeeder extends Seeder
{
    public function run(): void
    {
        // Crée un panier pour chaque utilisateur
        User::all()->each(function ($user) {
            Panier::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}