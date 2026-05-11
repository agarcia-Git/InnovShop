<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProduitFactory extends Factory
{
    public function definition(): array
    {
        // Génère un nom de produit tech aléatoire
        $name = fake()->randomElement([
            'iPhone 15 Pro', 'Samsung Galaxy S24', 'MacBook Air M3',
            'iPad Pro', 'AirPods Pro', 'Sony WH-1000XM5',
            'Dell XPS 15', 'Apple Watch Series 9', 'GoPro Hero 12',
            'Nintendo Switch OLED'
        ]);

        return [
            'name'           => $name,
            // Génère automatiquement le slug depuis le nom
            'slug'           => Str::slug($name) . '-' . fake()->unique()->randomNumber(4),
            'description'    => fake()->paragraph(3),
            'specifications' => fake()->paragraph(2),
            // Prix entre 10 et 2000€
            'price'          => fake()->randomFloat(2, 10, 2000),
            'image'          => null,
            'options'        => [
                'couleurs' => fake()->randomElements(
                    ['noir', 'blanc', 'gris', 'bleu', 'rouge'],
                    rand(1, 3)
                ),
            ],
            // 30% de chance d'être à la une
            'is_featured'    => fake()->boolean(30),
            'availability'   => true,
        ];
    }
}