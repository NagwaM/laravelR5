<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\City;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        City::factory(20)->create();
        Client::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Tom',
        //     'email' => 'tom@example.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('UN123456'),
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
