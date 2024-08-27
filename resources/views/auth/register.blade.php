@extends('layouts.app')

@section('title', 'Register - Kantin SMEA')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="login-container">
  <img src="{{ asset('img/logo.png') }}" alt="School Logo">
  <h2>Kantin SMEA</h2>
  <form action="{{ route('register') }}" method="POST">
    @csrf
    <!-- Nama Field -->
    <div class="form-group mb-3">
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Nama" required>
      @error('nama')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <!-- NISN Field -->
    <div class="form-group mb-3">
      <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" placeholder="NISN" required>
      @error('nisn')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <!-- Password Field -->
    <div class="form-group mb-3">
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <!-- Password Confirmation Field -->
    <div class="form-group mb-3">
      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-3">Register</button>
  </form>
  
  <!-- Link to Login -->
  <a href="{{ route('login') }}" class="form-text mt-3 d-block">Login</a>
</div>
@endsection
