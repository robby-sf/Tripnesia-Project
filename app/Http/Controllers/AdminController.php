<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin.Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            
            $admin = Auth::guard('admin')->user();
            
            session([
                'user_id' => $admin->id,
                'user_name' => $admin->nama,
                'user_role' => $admin->role,
            ]);
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'alamat'=> 'required|string|max:100',
            'tanggal_lahir'=> 'required|date|max:100',
            'nomor_telp'=> 'required|integer|max:15',
            'password' => 'required|min:6|confirmed'
        ]);

        $admin = Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nomor_telp' => $request->nomor_telp,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        Auth::guard('admin')->login($admin);

        return redirect('/admin');
    }
}
