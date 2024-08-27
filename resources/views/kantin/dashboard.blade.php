@extends('layouts.app')

@section('title', 'Dashboard - Kantin SMEA')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="container content-container">
  <h2 class="section-title">Trending Menu</h2>
  <div class="product-grid slideable">
    @foreach ($trendingMenu as $menu)
    <div class="card">
      <img src="{{ asset('img/' . $menu->foto) }}" alt="{{ $menu->nama }}">
      <div class="card-body">
        <h5 class="card-title">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</h5>
        <p class="card-text">{{ $menu->nama }}</p>
        <a href="{{ route('product.detail', $menu->id) }}" class="btn">Beli</a>
      </div>
    </div>
    @endforeach
  </div>

  <h2 class="section-title">Menu Pilihan</h2>
  <div class="product-grid slideable">
    @foreach ($selectedMenu as $menu)
    <div class="card">
      <img src="{{ asset('img/' . $menu->foto) }}" alt="{{ $menu->nama }}">
      <div class="card-body">
        <h5 class="card-title">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</h5>
        <p class="card-text">{{ $menu->nama }}</p>
        <a href="{{ route('product.detail', $menu->id) }}" class="btn">Beli</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
