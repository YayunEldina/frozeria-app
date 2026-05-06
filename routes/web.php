<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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