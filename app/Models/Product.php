<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan kolom baru di sini agar bisa disimpan (Mass Assignment)
    protected $fillable = [
        'name', 
        'category_id', 
        'stock', 
        'min_stock', // Tambahan
        'unit', 
        'price', 
        'purchase_price', // Tambahan
        'weight', // Tambahan (Berat/ukuran)
        'location', // Tambahan (Lokasi Simpan)
        'description', // Tambahan
        'image' // Tambahan (Foto Barang)
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}