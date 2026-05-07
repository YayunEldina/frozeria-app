@extends('layouts.app')

@section('content')
{{-- Menghilangkan p-8 dan bg-gray-50 agar putihnya menyatu ke seluruh layar --}}
<div class="w-full bg-white min-h-screen">
    {{-- max-w-full untuk memastikan kotak putih memenuhi lebar layar --}}
    <div class="w-full bg-white p-8 lg:p-12">
        
        {{-- Header & Tombol Kembali --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('products.index') }}" class="border border-gray-300 px-4 py-1 text-sm hover:bg-gray-50 flex items-center gap-2">
                ‹ Kembali
            </a>
            <h1 class="text-xl font-bold text-gray-800">Tambah Barang Baru</h1>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Area Upload Foto --}}
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700 tracking-wider">Foto barang</label>
                <div x-data="{ fileName: null }" class="border-2 border-dashed border-gray-300 p-10 text-center relative hover:bg-gray-50 transition w-full">
                    <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                           @change="fileName = $event.target.files[0].name">
                    
                    <div class="space-y-3">
                        <div class="flex justify-center">
                            <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-600" x-text="fileName ? fileName : 'Klik untuk memilih foto, atau seret file ke sini'"></p>
                        <p class="text-xs text-gray-400">Format: JPG, PNG — Maks. 2 MB</p>
                        <button type="button" class="border border-gray-300 px-4 py-1.5 text-xs font-medium bg-white">Pilih Foto</button>
                    </div>
                </div>
            </div>

            {{-- Grid Input --}}
            <div class="grid grid-cols-2 gap-6">
                {{-- Nama Barang --}}
                <div class="col-span-2 space-y-2">
                    <label class="text-sm text-gray-600">Nama barang <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="Contoh: Ayam nugget crispy" required>
                </div>

                {{-- Kategori --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" class="w-full text-sm border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none bg-white" required>
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Satuan --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Satuan <span class="text-red-500">*</span></label>
                    <input type="text" name="unit" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="pcs / pack / box" required>
                </div>

                {{-- Stok --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Jumlah stok <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" required>
                </div>

                {{-- Stok Minimum --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Stok minimum</label>
                    <input type="number" name="min_stock" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                {{-- Harga Jual --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Harga jual (Rp)</label>
                    <input type="number" name="price" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" required>
                </div>

                {{-- Harga Beli --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Harga beli (Rp)</label>
                    <input type="number" name="purchase_price" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                {{-- Kolom Baru: Berat/ukuran --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Berat/ukuran</label>
                    <input type="text" name="weight" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="Contoh: 500gr / 1 Liter">
                </div>

                {{-- Kolom Baru: Lokasi Simpan --}}
                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Lokasi simpan</label>
                    <input type="text" name="location" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="Contoh: Freezer A / Rak 2">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="space-y-2">
                <label class="text-sm text-gray-600">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none"></textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('products.index') }}" class="px-6 py-2 border border-gray-300 text-sm font-medium hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-6 py-2 bg-[#8bc34a] text-white text-sm font-medium hover:bg-[#7cb342] shadow-sm">Simpan Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection