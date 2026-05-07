<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->nullable()->default(0); // Tambah ini
            $table->string('unit');
            $table->decimal('price', 15, 2);
            $table->decimal('purchase_price', 15, 2)->nullable(); // Tambah ini
            $table->string('weight')->nullable(); // Tambah ini
            $table->string('location')->nullable(); // Tambah ini
            $table->text('description')->nullable(); // Tambah ini
            $table->string('image')->nullable(); // Tambah ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
