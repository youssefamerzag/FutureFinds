<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin@gmail.com',
            'role' => 'admin'
        ]);

        Categories::create([
            'name' => 'Phones'
        ]);

        Categories::create([
            'name' => 'Tablets'
        ]);

        Categories::create([
            'name' => 'Laptops'
        ]);

        Categories::create([
            'name' => 'Consoles'
        ]);
    }
}
