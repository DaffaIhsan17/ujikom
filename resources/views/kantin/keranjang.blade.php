@extends('layouts.app')

@section('title', 'Keranjang Kantin')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inika&family=Inknut+Antiqua:wght@700&family=Junge&family=Kanit:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <style>
        /* Mengubah font modal menjadi Kanit */
        #deleteConfirmationModal .modal-content {
            font-family: 'Kanit', sans-serif;
        }

        .btn {
          font-family: 'Kanit', sans-serif;
        }
        </style>
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
        <form id="checkout-form" method="POST" action="{{ route('keranjang.checkout') }}">
            @csrf
            @foreach ($cartItems as $item)
            <div class="cart-item" data-id="{{ $item->id }}">
                <input type="checkbox" class="menu-checkbox" name="selectedItems[]" value="{{ $item->id }}" data-price="{{ $item->harga }}" style="margin-right: 15px;">
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}">
                <div class="item-info">
                    <h5 class="menu-name">{{ $item->nama }}</h5>
                    <p class="price">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <p class="spiciness">{{ $item->level }}</p>
                </div>
                <div class="item-actions">
                    <div class="quantity-container">
                        <button type="button" class="quantity-btn minus">-</button>
                        <input type="text" class="quantity-input" value="{{ $item->jumlah }}" readonly>
                        <button type="button" class="quantity-btn plus">+</button>
                    </div>
                    <button type="button" class="btn btn-delete">
                        <img src="{{ asset('img/delete-icon.png') }}" alt="Hapus" class="delete-icon">
                    </button>
                </div>
            </div>
            @endforeach
        </form>
    </div>

    <!-- Cart Summary Section -->
    <div class="cart-summary">
        <h5>Ringkasan Belanja</h5>
        <div class="total-price">Rp. <span id="total-price">0</span></div>
        <button type="submit" form="checkout-form" class="btn">Beli</button>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus item ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" id="confirmDeleteButton" class="btn btn-danger">Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
    // JavaScript total harga dan select all logic
    const checkboxes = document.querySelectorAll('.menu-checkbox');
    const totalPriceElement = document.getElementById('total-price');
    const selectAllCheckbox = document.getElementById('select-all');
    const itemCheckboxes = document.querySelectorAll('.menu-checkbox');
    let deleteItemId = null;

    function calculateTotalPrice() {
        let total = 0;
        checkboxes.forEach(item => {
            if (item.checked) {
                const itemRow = item.closest('.cart-item');
                const quantityInput = itemRow.querySelector('.quantity-input');
                const itemPrice = parseInt(item.getAttribute('data-price'));
                const quantity = parseInt(quantityInput.value);
                total += itemPrice * quantity;
            }
        });
        totalPriceElement.textContent = total.toLocaleString(); 
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', calculateTotalPrice);
    });

    selectAllCheckbox.addEventListener('change', function() {
        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        calculateTotalPrice();
    });

    document.addEventListener('DOMContentLoaded', function (){
        const minusButtons = document.querySelectorAll('.quantity-btn.minus');
        const plusButtons = document.querySelectorAll('.quantity-btn.plus');
        const deleteButtons = document.querySelectorAll('.btn-delete');

        minusButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const input = this.nextElementSibling;
                const itemRow = this.closest('.cart-item');
                const itemId = itemRow.getAttribute('data-id');
                let value = parseInt(input.value);
                if (value > 1) {
                    value = value - 1;
                    input.value = value;
                    updateQuantity(itemId, value);
                }
            });
        });

        plusButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const input = this.previousElementSibling;
                const itemRow = this.closest('.cart-item');
                const itemId = itemRow.getAttribute('data-id');
                let value = parseInt(input.value);
                value = value + 1;
                input.value = value;
                updateQuantity(itemId, value);
            });
        });

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const itemRow = this.closest('.cart-item');
                deleteItemId = itemRow.getAttribute('data-id');
                $('#deleteConfirmationModal').modal('show');
            });
        });

        document.getElementById('confirmDeleteButton').addEventListener('click', function () {
            if (deleteItemId) {
                deleteItem(deleteItemId);
            }
            $('#deleteConfirmationModal').modal('hide');
        });

        function updateQuantity(itemId, newQuantity) {
            fetch(`/keranjang/update/${itemId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({jumlah: newQuantity})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    calculateTotalPrice(); // Update total harga
                } else {
                    alert('Gagal update item.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function deleteItem(itemId) {
            fetch(`/keranjang/delete/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`.cart-item[data-id="${itemId}"]`).remove();
                    calculateTotalPrice(); // Update total harga setelah item dihapus
                } else {
                    alert('Gagal menghapus item.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });

</script>
@endpush
