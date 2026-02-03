<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Jangan jalankan seeder otomatis di production kecuali diberi izin
        if (app()->environment('production')) {
            $allowSeedEnv = filter_var(env('ALLOW_DB_SEED', false), FILTER_VALIDATE_BOOLEAN);
            $usedForce = $this->command && method_exists($this->command, 'option') && $this->command->option('force');

            if (! $allowSeedEnv && ! $usedForce) {
                if ($this->command && method_exists($this->command, 'error')) {
                    $this->command->error('Seeding in production is disabled. Set ALLOW_DB_SEED=true in .env or run `php artisan db:seed --class=DatabaseSeeder --force` to override.');
                }

                return;
            }
        }

        // Buat atau perbarui admin user (hindari error duplicate saat seeding)
        User::updateOrCreate(
            ['email' => 'admin@katalog.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // Panggil seeder lain
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
