<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $items = [            
            [
                'id' => 1,
                'title' => $faker->name(),
                'description' => $faker->text,
                'image' => 'prueba.jpg',
                'price' => $faker->numberBetween($min = 15, $max = 100),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => $faker->name(),
                'description' => $faker->text,
                'image' => 'vaso.jpg',
                'price' => $faker->numberBetween($min = 15, $max = 100),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => $faker->name(),
                'description' => $faker->text,
                'image' => 'vaso.jpg',
                'price' => $faker->numberBetween($min = 15, $max = 100),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'title' => $faker->name(),
                'description' => $faker->text,
                'image' => 'vaso.jpg',
                'price' => $faker->numberBetween($min = 15, $max = 100),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'title' => $faker->name(),
                'description' => $faker->text,
                'image' => 'vaso.jpg',
                'price' => $faker->numberBetween($min = 15, $max = 100),
                'created_at' => now(),
                'updated_at' => now()
            ]
            
        ];    
    
        foreach ($items as $item) {
            Product::updateOrCreate(['id' => $item['id']], $item);
        }
    
    }
}
