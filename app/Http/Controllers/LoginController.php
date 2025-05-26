<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login');
    }

    public function login(Request $request)
{
    // Validasi input awal
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Cek apakah user dengan email tersebut ada
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        // Jika user tidak ditemukan berdasarkan email
        return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
    }

    // Jika email ditemukan, cek passwordnya
    if (!\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        // Jika password salah
        return back()->withErrors(['password' => 'Password salah'])->withInput();
    }

    // Jika semuanya benar, login user
    Auth::login($user);
    $request->session()->regenerate();
    return redirect()->intended('/');
}
}