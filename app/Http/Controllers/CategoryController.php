<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::withCount('products'); // Mengambil jumlah barang otomatis

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->get();
        $totalCategories = Category::count();

        return view('categories.index', compact('categories', 'totalCategories'));
    }

    // Tambahkan fungsi ini di dalam CategoryController
public function create()
{
    return view('categories.create'); 
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories,name|max:255'
    ]);

    \App\Models\Category::create($request->all());

    return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambah!');
}

// Tambahkan fungsi edit
public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

// Tambahkan fungsi update
public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|max:255|unique:categories,name,' . $category->id,
        'description' => 'nullable|string' // Pastikan deskripsi divalidasi juga (opsional)
    ]);

    $category->update($request->all()); // Ini akan mengambil semua input termasuk description

    return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
}

    public function destroy(Category $category)
    {
        // Cek jika masih ada produk di kategori ini (opsional)
        if ($category->products()->count() > 0) {
            return redirect()->back()->with('error', 'Kategori tidak bisa dihapus karena masih memiliki barang.');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}