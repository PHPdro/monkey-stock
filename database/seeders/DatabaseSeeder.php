<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Pedro',
        //     'email' => 'pedro110302@gmail.com',
        //     'password' => Hash::make('pedro123')
        // ]);

        \App\Models\Supplier::factory(10)->create();
    }
}
