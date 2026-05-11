@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen p-8 space-y-6">

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="border border-gray-200 p-6 rounded-none shadow-sm">
            <p class="text-gray-500 text-sm">Total barang</p>
            <h2 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalBarang }}</h2>
        </div>
        <div class="border border-gray-200 p-6 rounded-none shadow-sm">
            <p class="text-gray-500 text-sm">Total kategori</p>
            <h2 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalKategori }}</h2>
        </div>
        <div class="border border-gray-200 p-6 rounded-none shadow-sm">
            <p class="text-gray-500 text-sm">Stok menipis</p>
            <h2 class="text-4xl font-bold text-gray-800 mt-2">{{ $stokMenipis }}</h2>
        </div>
        <div class="border border-gray-200 p-6 rounded-none shadow-sm">
            <p class="text-gray-500 text-sm">Stok habis</p>
            <h2 class="text-4xl font-bold text-gray-800 mt-2">{{ $stokHabis }}</h2>
        </div>
    </div>

    {{-- Search & Filter --}}
    <form action="{{ route('products.index') }}" method="GET" class="flex gap-4">
        <div class="flex-grow">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." 
                   class="w-full border border-gray-300 px-4 py-2 rounded-none focus:outline-none focus:border-gray-500">
        </div>
        <div class="w-48">
            <select name="category" onchange="this.form.submit()" class="w-full border border-gray-300 px-4 py-2 rounded-none bg-white">
                <option value="">Semua kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- <button type="submit" class="bg-[#1a1d21] text-white px-6 py-2 rounded-none hover:bg-gray-800 transition">
            Cari
        </button> -->
    </form>

    {{-- Tabel Produk --}}
    <div class="border border-gray-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Nama barang</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Kategori</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Stok</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Satuan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Harga jual</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($products as $product)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $product->name }}</td>
                    <td class="px-6 py-4">
                        <span class="border border-gray-300 px-3 py-1 text-xs rounded-none bg-gray-50">
                            {{ $product->category->name ?? 'Tidak Berkategori' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $product->stock }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $product->unit }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('products.show', $product->id) }}" class="border border-gray-300 px-3 py-1 text-xs rounded-none hover:bg-gray-100">Detail</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="border border-blue-300 text-blue-600 px-3 py-1 text-xs rounded-none hover:bg-blue-50">Edit</a>
                        
                        <button 
                            type="button"
                            @click.prevent.stop="$dispatch('open-delete-modal', { id: '{{ $product->id }}', name: '{{ addslashes($product->name) }}' })" 
                            class="border border-red-300 text-red-600 px-3 py-1 text-xs rounded-none hover:bg-red-50 relative z-10">
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500 italic">Data barang tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="flex items-center justify-between mt-6">
        <p class="text-sm text-gray-500">
            Menampilkan {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} barang
        </p>
        <div class="flex border border-gray-300 divide-x divide-gray-300">
            @if ($products->onFirstPage())
                <span class="px-4 py-1.5 text-sm text-gray-400">&lt; Prev</span>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="px-4 py-1.5 text-sm hover:bg-gray-50">&lt; Prev</a>
            @endif

            <span class="px-4 py-1.5 text-sm bg-blue-50 text-blue-600">{{ $products->currentPage() }}</span>

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="px-4 py-1.5 text-sm hover:bg-gray-50">Next &gt;</a>
            @else
                <span class="px-4 py-1.5 text-sm text-gray-400">Next &gt;</span>
            @endif
        </div>
    </div>

</div>

{{-- Pemanggilan Modal Hapus Custom --}}
@include('products._delete_modal')

@endsection