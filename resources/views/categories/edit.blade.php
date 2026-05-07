@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen p-8 lg:p-12">
    <div class="max-w-2xl">
        <a href="{{ route('categories.index') }}" class="border border-gray-300 px-4 py-1.5 text-sm hover:bg-gray-50 transition mb-6 inline-block">
            < Kembali
        </a>
        
        <h1 class="text-xl font-bold text-gray-800 mb-8">Edit Kategori: {{ $category->name }}</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama kategori *</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                       class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi (opsional)</label>
                <textarea name="description" rows="4" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('categories.index') }}" class="px-6 py-2 border border-gray-300 text-sm hover:bg-gray-50">Batal</a>
                <button type="submit" class="bg-white border border-blue-500 text-blue-600 px-6 py-2 text-sm hover:bg-blue-50 transition">
                    Perbarui Kategori
                </button>
            </div>
        </form>
    </div>
</div>
@endsection