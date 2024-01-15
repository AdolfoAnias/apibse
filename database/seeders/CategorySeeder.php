<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {                
        $items = [            
                [
                    'id' => 1,
                    'name' => 'Informatica General',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => 'Motos',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => 'Piezas/Accesorios',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'name' => 'Flores',
                    'created_at' => now(),
                    'updated_at' => now()
                ]            
        ];    
        
        foreach ($items as $item) {
            Category::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
