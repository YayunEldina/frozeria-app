<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->nullable()->default(0); 
            $table->string('unit');
            $table->decimal('price', 15, 2);
            $table->decimal('purchase_price', 15, 2)->nullable(); 
            $table->string('weight')->nullable(); 
            $table->string('location')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('image')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
