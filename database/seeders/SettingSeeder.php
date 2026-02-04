<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
       Setting::updateOrCreate(
    ['id' => 1],
    [
        'site_name' => 'Katalog Produk',
        'whatsapp' => '6282120518342',
        'description' => 'Website katalog produk terbaik dengan berbagai pilihan kategori dan produk berkualitas.',
    ]);

    }
}
