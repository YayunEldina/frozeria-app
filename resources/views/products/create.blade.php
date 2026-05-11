@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen">
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
                <div x-data="{ fileName: null, imageUrl: null }" class="border-2 border-dashed border-gray-300 p-10 text-center relative hover:bg-gray-50 transition w-full min-h-[250px] flex flex-col items-center justify-center">
                    <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" 
                           @change="if ($event.target.files.length > 0) { fileName = $event.target.files[0].name; const reader = new FileReader(); reader.onload = (e) => { imageUrl = e.target.result }; reader.readAsDataURL($event.target.files[0]); }">
                    <div class="space-y-3">
                        <template x-if="imageUrl">
                            <div class="flex flex-col items-center gap-2">
                                <img :src="imageUrl" class="max-h-32 object-contain border border-gray-200 shadow-sm rounded bg-white">
                                <p class="text-xs text-gray-400 font-normal" x-text="fileName"></p>
                            </div>
                        </template>
                        <template x-if="!imageUrl">
                            <div class="flex justify-center">
                                <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </template>
                        <div class="space-y-1">
                            <p class="text-sm text-gray-600">Klik untuk memilih foto, atau seret file ke sini</p>
                            <p class="text-xs text-gray-400">Format: JPG, PNG — Maks. 2 MB</p>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="border border-gray-300 px-4 py-1.5 text-xs font-medium bg-white hover:bg-gray-50 tracking-wider">Pilih Foto</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grid Input --}}
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2 space-y-2">
                    <label class="text-sm text-gray-600">Nama barang <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="Contoh: Ayam nugget crispy">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" required class="w-full text-sm border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none bg-white">
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Satuan <span class="text-red-500">*</span></label>
                    <input type="text" name="unit" required class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="pcs / pack / box">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Jumlah stok <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" required class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Stok minimum</label>
                    <input type="number" name="min_stock" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Harga jual (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" required class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Harga beli (Rp)</label>
                    <input type="number" name="purchase_price" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Berat/ukuran</label>
                    <input type="text" name="weight" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="Contoh: 500gr / 1 Liter">
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Lokasi simpan</label>
                    <input type="text" name="location" class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none" placeholder="Contoh: Freezer A / Rak 2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm text-gray-600">Deskripsi <span class="text-red-500">*</span></label>
                
                <textarea name="description" 
                        rows="3" 
                        required 
                        placeholder="Masukkan detail produk..."
                        class="w-full border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('products.index') }}" class="px-6 py-2 border border-gray-300 text-sm font-medium hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-6 py-2 bg-[#8bc34a] text-white text-sm font-medium hover:bg-[#7cb342] shadow-sm">Simpan Barang</button>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT OTOMATIS PESAN VALIDASI --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = document.querySelectorAll('[required]');
        inputs.forEach(input => {
            input.oninvalid = function(e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("Data wajib diisi");
                }
            };
            input.oninput = function(e) {
                e.target.setCustomValidity("");
            };
        });
    });
</script>
@endsection