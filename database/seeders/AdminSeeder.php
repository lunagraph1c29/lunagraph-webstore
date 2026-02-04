<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@webstore.com')->exists();
        
        if (!$adminExists) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@webstore.com',
                'password' => Hash::make('Admin123'), // GANTI dengan password kuat
                'role' => 'admin',
            ]);
            
            echo "Admin berhasil dibuat!\n";
        } else {
            echo "Admin sudah ada.\n";
        }
    }
}