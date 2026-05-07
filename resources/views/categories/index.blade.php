@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen p-8 lg:p-12">
    <h1 class="text-xl font-bold text-gray-800 mb-6">Daftar Kategori</h1>

    {{-- Hanya Search Bar (Tombol sudah pindah ke Navbar) --}}
    <div class="mb-6">
        <form action="{{ route('categories.index') }}" method="GET" class="w-full">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Cari kategori..." 
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-gray-500">
        </form>
    </div>

    {{-- Tabel Kategori --}}
    <div class="border border-gray-200 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Nama kategori</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Jumlah barang</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Dibuat</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $category->products_count }} barang</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $category->created_at->format('j M Y') }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        {{-- Tombol Edit --}}
                        <a href="{{ route('categories.edit', $category->id) }}" 
                           class="border border-blue-300 text-blue-600 px-4 py-1 text-xs hover:bg-blue-50 transition">
                            Edit
                        </a>
                        
                        {{-- PEMBARUAN: Tombol Hapus memicu Modal Alpine.js --}}
                        <button 
                            type="button"
                            @click="$dispatch('open-delete-category-modal', { id: {{ $category->id }}, name: '{{ $category->name }}' })"
                            class="border border-red-300 text-red-500 px-4 py-1 text-xs hover:bg-red-50 transition"
                        >
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic font-light">
                        Belum ada kategori terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="bg-gray-50 p-4 border-t border-gray-200">
            <p class="text-xs text-gray-500">{{ $categories->count() }} kategori terdaftar</p>
        </div>
    </div>
</div>

{{-- Sertakan Modal di paling bawah --}}
@include('categories._delete_modal')

@endsection