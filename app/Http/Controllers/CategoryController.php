<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // 1. Tambahkan oldest() agar data terbaru muncul di paling bawah
        $query = Category::withCount('products')->oldest(); 

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->get();
        $totalCategories = Category::count();

        return view('categories.index', compact('categories', 'totalCategories'));
    }

   
public function create()
{
    return view('categories.create'); 
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories,name|max:255'
    ]);

    Category::create($request->all());

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
        'description' => 'nullable|string' 
    ]);

    $category->update($request->all()); 

    return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
}

public function destroy(Category $category)
{
    $category->products()->update(['category_id' => null]);
    $category->delete();
    
    return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus dan barang kini tidak berkategori.');
}
}