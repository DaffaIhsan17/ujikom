<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController; // Import your custom AuthController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes for Siswa
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Protect routes using auth:siswa middleware
Route::middleware(['auth.siswa'])->group(function () { // Ensure the correct guard
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::get('/kantin1', [ProductController::class, 'kantin1'])->name('kantin1');
    Route::get('/kantin2', [ProductController::class, 'kantin2'])->name('kantin2');
    Route::get('/keranjang', [ProductController::class, 'keranjang'])->name('keranjang');
    Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
