<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $stokMenipis = Product::where('stock', '>', 0)
        ->whereColumn('stock', '<=', 'min_stock')
        ->count();

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

public function create()
{
    // Mengambil semua kategori untuk drop-down
    $categories = Category::all(); 
    return view('products.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'unit' => 'required|string',
        'stock' => 'required|integer',
        'min_stock' => 'nullable|integer', 
        'price' => 'required|numeric',
        'purchase_price' => 'nullable|numeric', 
        'weight' => 'nullable|string',          
        'location' => 'nullable|string',        
        'description' => 'required|string',     
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $data = $request->all();

    // Logika upload foto jika ada
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan!');
}

public function edit(Product $product)
{
    // Mengambil semua kategori agar bisa dipilih di dropdown edit
    $categories = Category::all();
    
    // Menampilkan halaman edit.blade.php dengan data produk terkait
    return view('products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    // 1. Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'unit' => 'required|string',
        'stock' => 'required|integer',
        'min_stock' => 'nullable|integer',
        'price' => 'required|numeric',
        'purchase_price' => 'nullable|numeric',
        'weight' => 'nullable|string',
        'location' => 'nullable|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // 2. Ambil semua data input kecuali image
    $data = $request->all();

    // 3. Logika Upload Foto
    if ($request->hasFile('image')) {
        
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    // 4. Update data di database
    $product->update($data);

    // 5. Redirect kembali ke dashboard dengan pesan sukses
    return redirect()->route('products.index')->with('success', 'Barang berhasil diperbarui!');
}

public function show(Product $product)
{
    // Mengarahkan ke file detail (show.blade.php) dengan membawa data produk
    return view('products.show', compact('product'));
}

    // d. Ketentuan Hapus Data
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
    
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus');
    }
}