<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Style;
use App\Models\Product;
use App\Models\Valoration;

class DatabaseSeeder extends Seeder
{
    public function run(): void {
        // Crear estilos
        $modern = Style::create([
            'name' => 'Modern Minimalist',
            'difficulty' => 'Easy'
        ]);

        $classic = Style::create([
            'name' => 'Classic Vintage',
            'difficulty' => 'Medium'
        ]);

        $avantgarde = Style::create([
            'name' => 'Avant-garde Contemporary',
            'difficulty' => 'Hard'
        ]);

        // Crear productos
        $product1 = Product::create([
            'name' => 'Minimalist Chair',
            'id_style' => $modern->id,
            'price' => 299.99,
            'description' => 'Elegant and simple design with clean lines'
        ]);

        $product2 = Product::create([
            'name' => 'Vintage Wooden Table',
            'id_style' => $classic->id,
            'price' => 499.99,
            'description' => 'Timeless wooden craftsmanship with classic details'
        ]);

        $product3 = Product::create([
            'name' => 'Abstract Sculpture Lamp',
            'id_style' => $avantgarde->id,
            'price' => 179.99,
            'description' => 'Bold and innovative lighting piece'
        ]);

        // Crear valoraciones
        Valoration::create([
            'id_product' => $product1->id,
            'puntuation' => 5,
            'comment' => 'Excellent quality and design!',
            'date' => now()->subDays(10)
        ]);

        Valoration::create([
            'id_product' => $product1->id,
            'puntuation' => 4,
            'comment' => 'Very comfortable and stylish',
            'date' => now()->subDays(5)
        ]);

        Valoration::create([
            'id_product' => $product2->id,
            'puntuation' => 5,
            'comment' => 'Beautiful craftsmanship, worth every penny',
            'date' => now()->subDays(3)
        ]);
    }
}