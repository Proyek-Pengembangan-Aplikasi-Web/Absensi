<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Teacher Satu',
            'username' => 'teachersatu',
            'role' => 'guru',
            'email' => 'teachersatu@gmail.com',
            'password' => '12345678',
        ]);

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
        ]);
    }
}
