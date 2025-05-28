<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
    }

    if (!\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return back()->withErrors(['password' => 'Password salah'])->withInput();
    }

    Auth::login($user);
    $request->session()->regenerate();
    return redirect()->intended('/');
}
}