<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email salah!.',
            'password.required' => 'Password tidak boleh kosong.',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('home');
        }

        return back()->with(['error' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerate token CSRF

        return response()->json(['success' => true, 'message' => 'Anda telah logout.']);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Simpan data user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto-login setelah registrasi
        Auth::login($user);

        return redirect()->route('home');
    }
}
