<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:siswas,nisn',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ensure the password is hashed correctly
        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'password' => Hash::make($request->password), // Hash password securely
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('nisn', 'password');
    
        // Cek dengan guard 'siswa'
        if (Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            dd('Login failed', $credentials);
        }
        
    
        // Jika autentikasi gagal, redirect kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['nisn' => 'Invalid credentials.']);
    }
    

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout(); // Ensure using the correct guard

        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login');
    }
}
