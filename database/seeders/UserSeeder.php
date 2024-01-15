<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $role = Role::create(['name' => 'Manager']);
        $role = Role::create(['name' => 'Revisor']);

        $user = User::create([
            'name' => $faker->name,
            'email' =>  $faker->userName().'@mydomain.com',
            'password' => bcrypt('123456'),
        ]);     
        
        $user->assignRole('Manager');

        $user = User::create([
            'name' => $faker->name,
            'email' =>  $faker->userName().'@mydomain.com',
            'password' => bcrypt('123456'),
        ]);     
        
        $user->assignRole('Revisor');

    }
}
