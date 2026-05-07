<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Tambahkan ini --}}
    <title>Frozeria Stock App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body x-data class="bg-white m-0 p-0 overflow-x-hidden"> 
    
<nav class="bg-[#1a1d21] text-white w-full sticky top-0 z-50">
    <div class="w-full px-10"> 
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-10">
                <span class="text-xl font-bold italic">Frozeria <span class="text-gray-400 font-light">Stok</span></span>
                <div class="flex space-x-2">
                    <a href="/products" class="px-4 py-2 text-sm font-medium rounded {{ request()->is('products*') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                        Dashboard
                    </a>
                    <a href="/categories" class="px-4 py-2 text-sm font-medium rounded {{ request()->is('categories*') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                        Kategori
                    </a>
                    <a href="/help" class="px-4 py-2 text-sm font-medium rounded {{ request()->is('help*') ? 'bg-gray-800' : 'hover:bg-gray-700' }}">
                        Bantuan
                    </a>
                </div>
            </div>

            {{-- Tombol Dinamis di Sebelah Kanan --}}
            <div>
                @if(request()->is('products*'))
                    <a href="/products/create" class="border border-gray-500 px-4 py-1.5 text-sm rounded-none hover:bg-gray-700 transition">
                        + Tambah Barang
                    </a>
                @elseif(request()->is('categories*'))
                    <a href="{{ route('categories.create') }}" class="border border-gray-500 px-4 py-1.5 text-sm rounded-none hover:bg-gray-700 transition">
                        + Tambah Kategori
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

    <main class="w-full p-0 m-0"> 
        @yield('content')
    </main>
    
</body>
</html>