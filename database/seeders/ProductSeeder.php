<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [            
            [
                'id' => 1,
                'titulo' => 'Informatica',
                'description' => 'Informatica General',
                'imagen' => 'prueba.jpg',
                'precio' => '10.0',
                'created_at' => now(),
                'updated_at' => now()
            ],
    ];    
    
    foreach ($items as $item) {
        Category::updateOrCreate(['id' => $item['id']], $item);
    }
    
    }
}
