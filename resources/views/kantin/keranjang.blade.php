@extends('layouts.app')

@section('title', 'Keranjang Kantin')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inknut+Antiqua:wght@700&family=Junge&family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container cart-container">
    <!-- Cart Items Section as a Card -->
    <div class="cart-items-card">
      <h2 class="section-title">Keranjang Anda</h2>
  
      <!-- Pilih Semua -->
      <div class="select-all-container">
        <input type="checkbox" id="select-all" style="margin-right: 10px;">
        <label for="select-all">Pilih Semua</label>
      </div>
  
      <!-- Cart Items -->
      @foreach ($cartItems as $item)
      <div class="cart-item">
        <input type="checkbox" class="menu-checkbox" data-price="{{ $item->harga }}" style="margin-right: 15px;">
        <img src="{{ asset('img/' . $item->foto) }}" alt="{{ $item->nama }}">
        <div class="item-info">
          <h5 class="menu-name">{{ $item->nama }}</h5>
          <p class="price">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
          <p class="spiciness">Pedas : Level {{ $item->spiciness }}</p>
        </div>
        <button class="btn btn-delete">
          <img src="{{ asset('img/delete-icon.png') }}" alt="Hapus" class="delete-icon">
        </button>
      </div>
      @endforeach
    </div>
  
    <!-- Cart Summary Section -->
    <div class="cart-summary">
      <h5>Ringkasan Belanja</h5>
      <div class="total-price">Rp. <span id="total-price">0</span></div>
      <button class="btn">Beli</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // JavaScript to Calculate Total Price
    const checkboxes = document.querySelectorAll('.menu-checkbox');
    const totalPriceElement = document.getElementById('total-price');
    const selectAllCheckbox = document.getElementById('select-all');
    const itemCheckboxes = document.querySelectorAll('.menu-checkbox');

    function calculateTotalPrice() {
      let total = 0;
      checkboxes.forEach(item => {
        if (item.checked) {
          total += parseInt(item.getAttribute('data-price'));
        }
      });
      totalPriceElement.textContent = total.toLocaleString(); // Formats the number
    }

    // Add event listeners for individual checkboxes
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', calculateTotalPrice);
    });

    // JavaScript to handle 'Pilih Semua' checkbox functionality
    selectAllCheckbox.addEventListener('change', function() {
      itemCheckboxes.forEach(checkbox => {
        checkbox.checked = selectAllCheckbox.checked;
      });
      calculateTotalPrice(); // Calculate total price after selecting or deselecting all
    });
  </script>
@endpush
