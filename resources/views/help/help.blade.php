@extends('layouts.app')

@section('content')
<div class="w-full bg-white min-h-screen">
    
    <div class="w-full px-10 pt-8 pb-2"> 
        <h1 class="text-2xl font-bold text-gray-800">Panduan Penggunaan Sistem</h1>
    </div>

    <div class="w-full px-10 py-4 space-y-6">
        
        <div class="w-full border border-gray-200 rounded-none p-8 bg-white shadow-sm">
            <h2 class="text-lg font-bold text-gray-900 mb-6">Cara menambah barang baru</h2>
            <div class="space-y-4">
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">1</span>
                    <p class="text-gray-700 text-base">Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</p>
                </div>
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">2</span>
                    <p class="text-gray-700 text-base">Unggah foto barang (opsional), lalu isi formulir nama, kategori, satuan, jumlah stok, harga, dan lainnya.</p>
                </div>
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">3</span>
                    <p class="text-gray-700 text-base">Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</p>
                </div>
            </div>
        </div>

        <div class="w-full border border-gray-200 rounded-none p-8 bg-white shadow-sm">
            <h2 class="text-lg font-bold text-gray-900 mb-6">Cara update stok barang masuk</h2>
            <div class="space-y-4">
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">1</span>
                    <p class="text-gray-700 text-base">Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</p>
                </div>
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">2</span>
                    <p class="text-gray-700 text-base">Klik tombol <strong>Edit</strong> pada baris barang tersebut.</p>
                </div>
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">3</span>
                    <p class="text-gray-700 text-base">Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Simpan Barang</strong>.</p>
                </div>
            </div>
        </div>

        <div class="w-full border border-gray-200 rounded-none p-8 bg-white shadow-sm">
            <h2 class="text-lg font-bold text-gray-900 mb-6">Cara mengelola kategori</h2>
            <div class="space-y-4">
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">1</span>
                    <p class="text-gray-700 text-base">Buka halaman <strong>Kategori</strong> dari navigasi atas.</p>
                </div>
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">2</span>
                    <p class="text-gray-700 text-base">Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</p>
                </div>
                <div class="flex gap-4">
                    <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 border border-gray-300 rounded-none text-xs font-bold bg-gray-50">3</span>
                    <p class="text-gray-700 text-base">Menghapus kategori tidak akan menghapus barang — barang akan menjadi tidak berkategori.</p>
                </div>
            </div>
        </div>

        <div class="w-full border border-gray-200 rounded-none p-6 bg-gray-50 flex items-center gap-3">
            <div class="w-5 h-5 rounded-full border border-gray-400 flex items-center justify-center text-gray-500 text-[10px]">i</div>
            <p class="text-sm text-gray-600">
                Satuan barang diisi bebas sesuai kebutuhan — misalnya: <strong>pcs, pack, box, kg, liter, dan lain-lain</strong>.
            </p>
        </div>
    </div>

    <div class="w-full bg-[#1a1d21] text-white p-16 mt-10">
        <h3 class="text-lg font-bold mb-8 border-b border-gray-700 pb-4 italic text-gray-300">Informasi Detail Peserta</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-20 text-sm">
            <div class="flex justify-between border-b border-gray-800 pb-2">
                <span class="text-gray-400">Nama:</span>
                <span class="font-medium uppercase">Yayun Eldina</span>
            </div>
            <div class="flex justify-between border-b border-gray-800 pb-2">
                <span class="text-gray-400">NIM:</span>
                <span class="font-medium">2241720065</span>
            </div>
            <div class="flex justify-between border-b border-gray-800 pb-2">
                <span class="text-gray-400">Kelas:</span>
                <span class="font-medium">D-IV Teknik Informatika / 4F</span>
            </div>
            <div class="flex justify-between border-b border-gray-800 pb-2">
                <span class="text-gray-400">Nomor Telepon:</span>
                <span class="font-medium">082232961402</span>
            </div>
            <div class="md:col-span-2 flex justify-between border-b border-gray-800 pb-2">
                <span class="text-gray-400">Alamat:</span>
                <span class="font-medium">Perumahan Landungsari Asri Blok A, Gg.2 No.A48a, Dau, Malang</span>
            </div>
            <div class="md:col-span-2 flex justify-between border-b border-gray-800 pb-2">
                <span class="text-gray-400">Email:</span>
                <span class="font-medium">yayuneldina02@gmail.com</span>
            </div>
        </div>
    </div>
</div>
@endsection