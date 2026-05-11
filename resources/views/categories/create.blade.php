@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen p-8 lg:p-12">
    <div class="max-w-2xl">
        <a href="{{ route('categories.index') }}" class="border border-gray-300 px-4 py-1.5 text-sm hover:bg-gray-50 transition mb-6 inline-block">
            < Kembali
        </a>
        
        <h1 class="text-xl font-bold text-gray-800 mb-8">Tambah Kategori</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama kategori *</label>
                <input type="text" 
                        name="name" 
                        required 
                        placeholder="Ayam"
                        oninvalid="this.setCustomValidity('Data wajib diisi')" 
                        oninput="this.setCustomValidity('')"
                        class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500 @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi (opsional)</label>
                <textarea name="description" rows="4" placeholder="Produk berbahan dasar ayam beku..."
                          class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500"></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('categories.index') }}" class="px-6 py-2 border border-gray-300 text-sm hover:bg-gray-50">Batal</a>
                <button type="submit" class="bg-white border border-green-500 text-green-600 px-6 py-2 text-sm hover:bg-green-50 transition">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
@endsection