<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'name', 
        'category_id', 
        'stock', 
        'min_stock', 
        'unit', 
        'price', 
        'purchase_price', 
        'weight', 
        'location', 
        'description', 
        'image' 
    ];

   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}