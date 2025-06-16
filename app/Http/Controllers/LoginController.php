<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('User.Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember');

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            
            $user = Auth::guard('web')->user();
            
            session([
                'user_id' => $user->id,
                'user_name' => $user->nama,
                'user_role' => $user->role,
            ]);
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}