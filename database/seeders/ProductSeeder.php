<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Isi Kategori
        DB::table('categories')->insert([
            ['name' => 'Ayam', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sapi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seafood', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sayuran', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Isi Produk
        DB::table('products')->insert([
            ['name' => 'Ayam nugget crispy', 'category_id' => 1, 'stock' => 120, 'unit' => 'pcs', 'price' => 35000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sosis sapi premium', 'category_id' => 2, 'stock' => 15, 'unit' => 'pack', 'price' => 28000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dim sum udang', 'category_id' => 3, 'stock' => 0, 'unit' => 'box', 'price' => 45000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bakso urat sapi', 'category_id' => 2, 'stock' => 60, 'unit' => 'pack', 'price' => 22000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edamame beku', 'category_id' => 4, 'stock' => 0, 'unit' => 'pack', 'price' => 18000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}