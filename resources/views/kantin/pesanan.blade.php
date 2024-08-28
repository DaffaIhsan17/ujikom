@extends('layouts.app')

@section('title', 'Pesanan Anda')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inknut+Antiqua:wght@700&family=Junge&family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/pesanan.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container pesanan-container">
    <h2 class="section-title">Pesanan Anda</h2>

    <!-- Pesanan List -->
    <div class="pesanan-list">
        @foreach ($pesananItems as $item)
        <div class="pesanan-item">
            <img src="{{ asset('img/' . $item->foto) }}" alt="{{ $item->nama }}" class="pesanan-foto">
            <div class="item-info">
                <h5 class="menu-name">{{ $item->nama }}</h5>
                <p class="price">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                <p class="spiciness">Pedas : {{ $item->level }}</p>
                <p class="quantity">{{ $item->jumlah }} barang</p>
            </div>
            <div class="item-status">
                <span class="status {{ $item->status_class }}">{{ $item->status }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
