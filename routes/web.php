<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// 1. Rute utama otomatis ke Dashboard
Route::get('/', function () {
    return redirect('/products'); 
});

// 2. Rute Resource untuk Dashboard (PENTING: Jangan sampai hapus baris ini)
Route::resource('products', ProductController::class);

// 3. Rute untuk halaman Bantuan
Route::get('/help', function () {
    return view('help.help'); 
});

// Rute untuk Kategori (Pastikan urutannya seperti ini)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); // Tambahkan ini
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update'); // Tambahkan ini
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');