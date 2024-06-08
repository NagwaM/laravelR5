<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Tom',
            'email' => 'tom@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('UN123456'),
            'remember_token' => Str::random(10),
        ]);
    }
}
