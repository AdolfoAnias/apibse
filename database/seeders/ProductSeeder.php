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
                'description' => 'Informatica General',
                'image' => 'prueba.jpg',
                'price' => '10.0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => $faker->name(),
                'description' => 'Vasos General',
                'image' => 'vaso.jpg',
                'price' => '20.0',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];    
    
        foreach ($items as $item) {
            Product::updateOrCreate(['id' => $item['id']], $item);
        }
    
    }
}
