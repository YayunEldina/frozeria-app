@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen">
    <div class="w-full bg-white p-8 lg:p-12">
        
        {{-- Header & Tombol Kembali --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('products.index') }}" class="border border-gray-300 px-4 py-1 text-sm hover:bg-gray-50 flex items-center gap-2">
                ‹ Kembali
            </a>
            <h1 class="text-xl font-bold text-gray-800">Edit Barang</h1>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Area Upload Foto --}}
<div class="space-y-2">
    <label class="text-sm font-medium text-gray-700 tracking-wider">Foto barang</label>
    
    <div x-data="{ 
            fileName: null, 
            previewUrl: '{{ $product->image ? asset('storage/' . $product->image) : '' }}' 
         }" 
         class="border-2 border-dashed border-gray-300 p-10 text-center relative hover:bg-gray-50 transition w-full min-h-[250px] flex flex-col items-center justify-center">
        
        {{-- Input File --}}
        <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" 
               @change="
                if ($event.target.files.length > 0) {
                    fileName = $event.target.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => { previewUrl = e.target.result };
                    reader.readAsDataURL($event.target.files[0]);
                }
               ">
        
        <div class="space-y-3">
            {{-- 1. Preview Gambar (Muncul jika ada foto lama ATAU foto baru) --}}
            <div class="flex flex-col items-center gap-2">
                <template x-if="previewUrl">
                    <img :src="previewUrl" class="max-h-32 object-contain border border-gray-200 shadow-sm rounded bg-white">
                </template>
                
                {{-- Icon jika benar-benar tidak ada gambar sama sekali --}}
                <template x-if="!previewUrl">
                    <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </template>

                {{-- 2. Nama File (Hanya muncul jika user memilih file BARU) --}}
                <template x-if="fileName">
                    <p class="text-xs text-gray-400 font-normal mt-1" x-text="fileName"></p>
                </template>
            </div>

            {{-- 3. Teks Instruksi & Format (Selalu Ada) --}}
            <div class="space-y-1">
                <p class="text-sm text-gray-600">Klik untuk mengganti foto, atau seret file ke sini</p>
                <p class="text-xs text-gray-400">Format: JPG, PNG — Maks. 2 MB</p>
            </div>

            {{-- 4. Tombol Visual --}}
            <div class="pt-2">
                <button type="button" class="border border-gray-300 px-4 py-1.5 text-xs font-medium bg-white hover:bg-gray-50 tracking-wider">
                    Pilih Foto
                </button>
            </div>
        </div>
    </div>
</div>

            {{-- Grid Input --}}
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2 space-y-2">
                    <label class="text-sm text-gray-600">Nama barang <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" class="w-full text-sm border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none bg-white" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Satuan <span class="text-red-500">*</span></label>
                    <input type="text" name="unit" value="{{ $product->unit }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Jumlah stok <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Stok minimum</label>
                    <input type="number" name="min_stock" value="{{ $product->min_stock }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Harga jual (Rp)</label>
                    <input type="number" name="price" value="{{ (int)$product->price }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Harga beli (Rp)</label>
                    <input type="number" name="purchase_price" value="{{ (int)$product->purchase_price }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Berat/ukuran</label>
                    <input type="text" name="weight" value="{{ $product->weight }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Lokasi simpan</label>
                    <input type="text" name="location" value="{{ $product->location }}" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm text-gray-600">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">{{ $product->description }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('products.index') }}" class="px-6 py-2 border border-gray-300 text-sm font-medium hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-6 py-2 bg-[#8bc34a] text-white text-sm font-medium hover:bg-[#7cb342] shadow-sm">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection