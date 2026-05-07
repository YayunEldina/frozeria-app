@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen p-8 lg:p-12">
    
    {{-- Top Navigation & Buttons --}}
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}" class="border border-gray-300 px-4 py-1 text-sm hover:bg-gray-50">
                ‹ Kembali
            </a>
            <h1 class="text-xl font-bold text-gray-800">Detail Barang</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('products.edit', $product->id) }}" class="border border-blue-400 text-blue-600 px-6 py-1.5 text-sm hover:bg-blue-50">
                Edit Barang
            </a>
            <button 
                type="button" 
                @click="$dispatch('open-delete-modal', { id: {{ $product->id }}, name: '{{ $product->name }}' })"
                class="border border-red-300 text-red-500 px-6 py-1.5 text-sm hover:bg-red-50 transition"
            >
                Hapus
            </button>
        </div>
    </div>

    {{-- Main Content Card --}}
    <div class="border border-gray-200 rounded-sm p-6 shadow-sm">
        <div class="flex gap-8 mb-8">
            {{-- Bagian Foto --}}
            <div class="w-48 h-48 bg-gray-50 border border-gray-200 flex items-center justify-center overflow-hidden">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                @else
                    <svg class="w-16 h-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                @endif
            </div>

            {{-- Nama & Kategori --}}
            <div class="flex-1">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h2>
                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm border border-gray-200">
                    {{ $product->category->name }}
                </span>
            </div>
        </div>

        {{-- Grid Informasi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-gray-200 border border-gray-200 mb-6">
            <div class="bg-white p-4">
                <p class="text-sm text-gray-400 mb-1">Jumlah stok</p>
                <p class="text-lg font-semibold text-gray-800">{{ $product->stock }} {{ $product->unit }}</p>
            </div>
            <div class="bg-white p-4">
                <p class="text-sm text-gray-400 mb-1">Stok minimum</p>
                <p class="text-lg font-semibold text-gray-800">{{ $product->min_stock ?? '0' }} {{ $product->unit }}</p>
            </div>
            <div class="bg-white p-4">
                <p class="text-sm text-gray-400 mb-1">Harga jual</p>
                <p class="text-lg font-semibold text-gray-800">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white p-4">
                <p class="text-sm text-gray-400 mb-1">Harga beli</p>
                <p class="text-lg font-semibold text-gray-800">Rp {{ number_format($product->purchase_price, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white p-4">
                <p class="text-sm text-gray-400 mb-1">Berat / ukuran</p>
                <p class="text-lg font-semibold text-gray-800">{{ $product->weight ?? '-' }}</p>
            </div>
            <div class="bg-white p-4">
                <p class="text-sm text-gray-400 mb-1">Lokasi simpan</p>
                <p class="text-lg font-semibold text-gray-800">{{ $product->location ?? '-' }}</p>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="bg-white border border-gray-200 p-4">
            <p class="text-sm text-gray-400 mb-2">Deskripsi</p>
            <p class="text-gray-600 leading-relaxed">
                {{ $product->description ?? 'Tidak ada deskripsi untuk barang ini.' }}
            </p>
        </div>
    </div>
</div>

{{-- Memanggil Modal Hapus Produk --}}
@include('products._delete_modal')

@endsection