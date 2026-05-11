<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crée un admin fixe
        User::create([
            'last_name'  => 'Admin',
            'first_name' => 'InnovShop',
            'email'      => 'admin@innovshop.com',
            'password'   => Hash::make('password'),
            'role'       => 'admin',
            'address'    => null,
        ]);

        // Crée un client fixe pour les tests
        User::create([
            'last_name'  => 'Dupont',
            'first_name' => 'Jean',
            'email'      => 'jean.dupont@gmail.com',
            'password'   => Hash::make('password'),
            'role'       => 'customer',
            'address'    => '12 rue de la Paix',
        ]);

        // Crée 10 clients aléatoires avec la factory
        User::factory(10)->create();
    }
}