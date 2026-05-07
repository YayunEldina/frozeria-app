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
            ['id' => 1, 'name' => 'Ayam', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Sapi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Seafood', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Sayuran', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Isi Produk secara lengkap
        DB::table('products')->insert([
            [
                'name' => 'Ayam nugget crispy', 
                'category_id' => 1, 
                'stock' => 120, 
                'min_stock' => 20,
                'unit' => 'pcs', 
                'price' => 35000, 
                'purchase_price' => 28000,
                'weight' => '500 gram',
                'location' => 'Freezer A-1',
                'description' => 'Nugget ayam dengan balutan tepung roti renyah.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Sosis sapi premium', 
                'category_id' => 2, 
                'stock' => 15, 
                'min_stock' => 10,
                'unit' => 'pack', 
                'price' => 28000, 
                'purchase_price' => 22000,
                'weight' => '400 gram',
                'location' => 'Freezer B-2',
                'description' => 'Sosis sapi kualitas premium isi 10 pcs.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Dim sum udang', 
                'category_id' => 3, 
                'stock' => 50, 
                'min_stock' => 5,
                'unit' => 'box', 
                'price' => 45000, 
                'purchase_price' => 35000,
                'weight' => '350 gram',
                'location' => 'Freezer A-2',
                'description' => 'Dimsum udang lembut siap kukus.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Bakso urat sapi', 
                'category_id' => 2, 
                'stock' => 60, 
                'min_stock' => 15,
                'unit' => 'pack', 
                'price' => 22000, 
                'purchase_price' => 18000,
                'weight' => '250 gram',
                'location' => 'Freezer B-1',
                'description' => 'Bakso sapi urat asli tanpa pengawet.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Edamame beku', 
                'category_id' => 4, 
                'stock' => 30, 
                'min_stock' => 5,
                'unit' => 'pack', 
                'price' => 18000, 
                'purchase_price' => 12000,
                'weight' => '500 gram',
                'location' => 'Rak A-02',
                'description' => 'Kacang edamame pilihan dalam kondisi beku.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Nugget Ikan', 
                'category_id' => 3, 
                'stock' => 200, 
                'min_stock' => 20,
                'unit' => 'pcs', 
                'price' => 10000, 
                'purchase_price' => 7500,
                'weight' => '500 gram',
                'location' => 'Rak A-06',
                'description' => 'Nugget ikan dengan citra rasa gurih dari ikan segar.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);
    }
}