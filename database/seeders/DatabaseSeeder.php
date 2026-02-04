<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@katalog.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // SEEDER LAIN
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
