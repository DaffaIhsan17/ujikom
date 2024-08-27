@extends('layouts.app')

@section('title', 'Login - Kantin SMEA')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="login-container">
  <img src="{{ asset('img/logo.png') }}" alt="School Logo">
  <h2>Kantin SMEA</h2>
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
      <input type="text" class="form-control" name="nisn" placeholder="NISN" required>
    </div>
    <div class="form-group mb-3">
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Login</button>
  </form>
  <a href="{{ route('register') }}" class="form-text mt-3 d-block">Create account</a>
</div>
@endsection
