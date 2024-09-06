@extends('layouts.app')

@section('title', $pageTitle)

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inknut+Antiqua:wght@700&family=Junge&family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/pesanan.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container pesanan-container">
    <h2 class="section-title">{{ $pageTitle }}</h2>

    <!-- Tombol Navigasi -->
    <div class="btn-group mb-3">
        <a href="{{ route('pesanan.sedangDiproses') }}" class="btn btn-primary">Sedang Diproses</a>
        <a href="{{ route('pesanan.selesai') }}" class="btn btn-success">Selesai</a>
        <a href="{{ route('pesanan.gagal') }}" class="btn btn-danger">Gagal</a>
    </div>

    <!-- Pesanan List -->
    <div class="pesanan-list">
        @if (isset($pesananSedangDiproses))
            @if($pesananSedangDiproses->isEmpty())
                <p>Tidak ada pesanan yang sedang diproses.</p>
            @else
                @foreach ($pesananSedangDiproses as $item)
                <div class="pesanan-item">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="pesanan-foto">
                    <div class="item-info">
                        <h5 class="menu-name">{{ $item->nama }}</h5>
                        <p class="price">Rp. {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</p>
                        <p class="spiciness">{{ $item->level }}</p>
                        <p class="quantity">{{ $item->jumlah }} barang</p>
                    </div>
                    <div class="item-status">
                        <span class="status {{ $item->status }}">{{ $item->status }}</span>
                    </div>
                </div>
                @endforeach
            @endif
        @endif

        @if (isset($pesananSelesai))
            @if($pesananSelesai->isEmpty())
                <p>Tidak ada pesanan yang selesai.</p>
            @else
                @foreach ($pesananSelesai as $item)
                <div class="pesanan-item">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="pesanan-foto">
                    <div class="item-info">
                        <h5 class="menu-name">{{ $item->nama }}</h5>
                        <p class="price">Rp. {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</p>
                        <p class="spiciness">{{ $item->level }}</p>
                        <p class="quantity">{{ $item->jumlah }} barang</p>
                    </div>
                    <div class="item-status">
                        <span class="status {{ $item->status }}">{{ $item->status }}</span>
                    </div>
                </div>
                @endforeach
            @endif
        @endif

        @if (isset($pesananGagal))
            @if($pesananGagal->isEmpty())
                <p>Tidak ada pesanan yang gagal.</p>
            @else
                @foreach ($pesananGagal as $item)
                <div class="pesanan-item">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="pesanan-foto">
                    <div class="item-info">
                        <h5 class="menu-name">{{ $item->nama }}</h5>
                        <p class="price">Rp. {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</p>
                        <p class="spiciness"> {{ $item->level }}</p>
                        <p class="quantity">{{ $item->jumlah }} barang</p>
                    </div>
                    <div class="item-status">
                        <span class="status {{ $item->status }}">{{ $item->status }}</span>
                    </div>
                </div>
                @endforeach
            @endif
        @endif
    </div>
</div>
@endsection
