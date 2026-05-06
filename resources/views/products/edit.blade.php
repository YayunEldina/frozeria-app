@extends('layouts.app')

@section('content')
<h2>Edit Produk</h2>

<form action="/products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection