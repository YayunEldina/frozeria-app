@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow-md">
    <div class="flex items-center gap-4 mb-6">
        <a href="/products" class="border px-4 py-1 rounded text-sm">Kembali</a>
        <h2 class="text-xl font-bold">Tambah Barang Baru</h2>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-6">
            <p class="text-gray-500">Klik untuk memilih foto, atau seret file ke sini</p>
            <input type="file" name="image" class="mt-4">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label class="block text-sm font-medium">Nama Barang *</label>
                <input type="text" name="name" class="w-full border p-2 rounded bg-gray-50" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Kategori *</label>
                <select name="category_id" class="w-full border p-2 rounded bg-gray-50">
                    <option>Pilih kategori</option>
                    </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Satuan *</label>
                <input type="text" name="unit" placeholder="pcs, pack, box" class="w-full border p-2 rounded bg-gray-50">
            </div>

            <div>
                <label class="block text-sm font-medium">Jumlah Stok *</label>
                <input type="number" name="stock" class="w-full border p-2 rounded bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium">Stok Minimum</label>
                <input type="number" name="min_stock" class="w-full border p-2 rounded bg-gray-50">
            </div>

            <div>
                <label class="block text-sm font-medium">Harga Jual (Rp)</label>
                <input type="number" name="selling_price" class="w-full border p-2 rounded bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium">Harga Beli (Rp)</label>
                <input type="number" name="purchase_price" class="w-full border p-2 rounded bg-gray-50">
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-2">
            <button type="button" class="px-6 py-2 border rounded">Batal</button>
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded">Simpan Barang</button>
        </div>
    </form>
</div>
@endsection