<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use App\Models\Category; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // a & b. Logika Pencarian dan Filter Kategori
        $query = Product::query();

        // Ketentuan a: Search bar berdasarkan nama
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ketentuan b: Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // PERBAIKAN DI SINI: Menggunakan paginate, bukan get
        $products = $query->paginate(10)->withQueryString();
        
        $categories = Category::all();

        // g. Card 'Stok Menipis': jumlah barang yang stoknya < 20
        $stokMenipis = Product::where('stock', '>', 0)->where('stock', '<', 20)->count();

        // h. Card 'Stok Habis': jumlah barang yang stoknya 0
        $stokHabis = Product::where('stock', 0)->count();
        
        $totalBarang = Product::count();
        $totalKategori = Category::count();

        return view('products.index', compact(
            'products', 
            'categories', 
            'stokMenipis', 
            'stokHabis', 
            'totalBarang', 
            'totalKategori'
        ));
    }

    // d. Ketentuan Hapus Data
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus');
    }
}