@extends('layouts.app')

@section('title', 'Kantin SMEA - Detail Produk')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inknut+Antiqua:wght@700&family=Junge&family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
@endpush

@section('content')
  <!-- Product Detail Section -->
  <div class="container content-container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
      <div class="col-md-6 text-center">
        <!-- Use the product's image -->
        <img src="{{ asset('img/' . $product->foto) }}" alt="{{ $product->name }}" class="img-fluid rounded-circle product-image" style="width: 300px; height: 300px;">
      </div>
      <div class="col-md-6 text-center text-md-start">
        <!-- Display the product's name and price dynamically -->
        <h1 class="product-title">{{ $product->nama }}</h1>
        <h2 class="product-price">Rp. {{ number_format($product->harga, 0, ',', '.') }}</h2>
        <p class="text-muted">Kondisi: Fresh</p>
        
        <!-- Spicy Level Selection -->
        <div class="mt-3">
          <label for="spiceLevel" class="form-label">Pedas</label>
          <select id="spiceLevel" class="form-select" style="width: 150px; display: inline-block;">
            <option value="Original">Original</option>
            <option value="Level1">Level 1</option>
            <option value="Level2">Level 2</option>
            <option value="Level3">Level 3</option>
          </select>
        </div>

        <!-- Quantity Selection -->
        <div class="mt-3">
          <label for="quantity" class="form-label">Jumlah</label>
          <input type="number" id="quantity" class="form-control" value="1" min="1" style="width: 100px; display: inline-block;">
        </div>

        <!-- Buy Button -->
        <button class="btn btn-dark mt-4" style="width: 150px;">Beli</button>
      </div>
    </div>
  </div>
@endsection
