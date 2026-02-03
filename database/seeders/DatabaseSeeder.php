<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@katalog.com',
            'password' => Hash::make('password123'),
        ]);

        // Panggil seeder lain
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
