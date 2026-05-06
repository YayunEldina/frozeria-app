<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gabungkan semua pemanggilan di dalam satu fungsi run saja
        $this->call([
            ProductSeeder::class,
        ]);
    }
}