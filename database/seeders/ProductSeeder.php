<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Sunset Over Darwin Harbour',
                'description' => 'A vivid oil painting capturing the warm tones of a Darwin harbour sunset.',
                'price'       => 250.00,
                'category'    => 'Painting',
                'colour'      => 'Orange',
                'size'        => '60x90cm',
                'available'   => true,
            ],
            [
                'name'        => 'Kakadu Wetlands',
                'description' => 'A lush depiction of the Kakadu wetlands in the wet season.',
                'price'       => 320.00,
                'category'    => 'Painting',
                'colour'      => 'Green',
                'size'        => '80x120cm',
                'available'   => true,
            ],
            [
                'name'        => 'Aboriginal Dot Art — Arnhem Land',
                'description' => 'Traditional dot art inspired by the Arnhem Land region.',
                'price'       => 180.00,
                'category'    => 'Traditional',
                'colour'      => 'Mixed',
                'size'        => '50x50cm',
                'available'   => true,
            ],
            [
                'name'        => 'Saltwater Crocodile Sketch',
                'description' => 'A detailed charcoal sketch of a saltwater crocodile.',
                'price'       => 95.00,
                'category'    => 'Sketch',
                'colour'      => 'Black',
                'size'        => '30x40cm',
                'available'   => true,
            ],
            [
                'name'        => 'Tropical Storm — Wet Season',
                'description' => 'A dramatic painting of a tropical storm rolling in over the Top End.',
                'price'       => 410.00,
                'category'    => 'Painting',
                'colour'      => 'Blue',
                'size'        => '100x150cm',
                'available'   => true,
            ],
            [
                'name'        => 'Red Centre Landscape',
                'description' => 'A sweeping landscape of the Australian Red Centre.',
                'price'       => 275.00,
                'category'    => 'Painting',
                'colour'      => 'Red',
                'size'        => '70x100cm',
                'available'   => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}