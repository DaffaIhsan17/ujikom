@extends('layouts.app')

@section('title', 'Dashboard - Kantin SMEA')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inknut+Antiqua:wght@700&family=Junge&family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="container content-container">
  <h2 class="section-title">Trending Menu</h2>
  <!-- <div class="row gap-5"> -->
  <div class="owl-carousel carousel-1">
    @foreach ($trendingMenu as $menu)
      <div class="card">
        <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama }}">
        <div class="card-body">
          <h5 class="card-title">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</h5>
          <p class="card-text">{{ $menu->nama }}</p>
          <a href="{{ route('product.detail', $menu->id) }}" class="btn">Beli</a>
        </div>
      </div>
    @endforeach
  </div>

  <h2 class="section-title">Menu Pilihan</h2>
  <div class="owl-carousel carousel-1">
    @foreach ($selectedMenu as $menu)
    <div class="card">
      <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama }}">
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
@push('scripts')
<script>
        $(document).ready(function(){
            $(".carousel-1").owlCarousel({
                items: 5,
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                  },
                  navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                  ]
            });
        });
    </script>
@endpush