<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
                'image_url'   => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800',
            ],
            [
                'name'        => 'Wetlands',
                'description' => 'A lush depiction of the wetlands in the wet season.',
                'price'       => 320.00,
                'category'    => 'Painting',
                'colour'      => 'Green',
                'size'        => '80x120cm',
                'available'   => true,
                'image_url'   => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800',
            ],
            [
                'name'        => 'Dot Art',
                'description' => 'Traditional dot art.',
                'price'       => 180.00,
                'category'    => 'Traditional',
                'colour'      => 'Mixed',
                'size'        => '50x50cm',
                'available'   => true,
                'image_url'   => 'https://images.unsplash.com/photo-1549490349-8643362247b5?w=800',
            ],
            [
                'name'        => 'Animal Sketch',
                'description' => 'A detailed charcoal sketch of an animal.',
                'price'       => 95.00,
                'category'    => 'Sketch',
                'colour'      => 'Black',
                'size'        => '30x40cm',
                'available'   => true,
                'image_url'   => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=800',
            ],
            [
                'name'        => 'Tropical Storm — Wet Season',
                'description' => 'A dramatic painting of a tropical storm rolling in over the Top End.',
                'price'       => 410.00,
                'category'    => 'Painting',
                'colour'      => 'Blue',
                'size'        => '100x150cm',
                'available'   => true,
                'image_url'   => 'https://images.unsplash.com/photo-1501999635878-71cb5379c2d8?w=800',
            ],
            [
                'name'        => 'Red Centre Landscape',
                'description' => 'A sweeping landscape of the Australian Red Centre.',
                'price'       => 275.00,
                'category'    => 'Painting',
                'colour'      => 'Red',
                'size'        => '70x100cm',
                'available'   => false,
                'image_url'   => 'https://images.unsplash.com/photo-1529111290557-82f6d5c6cf85?w=800',
            ],
        ];

        foreach ($products as $product) {
            // Download and store image
            $imagePath = null;
            try {
                $imageContents = file_get_contents($product['image_url']);
                $filename = 'products/' . uniqid() . '.jpg';
                Storage::disk('public')->put($filename, $imageContents);
                $imagePath = $filename;
            } catch (\Exception $e) {
                // If image download fails, just leave it null
            }

            Product::create([
                'name'        => $product['name'],
                'description' => $product['description'],
                'price'       => $product['price'],
                'category'    => $product['category'],
                'colour'      => $product['colour'],
                'size'        => $product['size'],
                'available'   => $product['available'],
                'image'       => $imagePath,
            ]);
        }
    }
}