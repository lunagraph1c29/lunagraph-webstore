<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'site_name' => 'Katalog Produk',
            'whatsapp' => '628123456789',
            'description' => 'Website katalog produk terbaik dengan berbagai pilihan kategori dan produk berkualitas.',
        ]);
    }
}
