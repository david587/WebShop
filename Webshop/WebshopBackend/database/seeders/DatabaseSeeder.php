<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Brand::factory(4)->create();
        \App\Models\Categorie::factory(4)->create();
        \App\Models\User::factory()->state([
            'name' => 'david',
            'email' => 'david@gmail.com',
            'address' => 'AranyHegy',
            'email_verified_at' => now(),
            'admin_since' => now(),
            'password' => Hash::make('titok'),
            'remember_token' => Str::random(10),
        ])->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
