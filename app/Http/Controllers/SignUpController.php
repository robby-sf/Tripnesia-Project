<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function showRegisterForm()
    {
        return view('SignUp');
    }

    public function register(Request $request)
{
    $request->validate([
        'nama_depan' => 'required|string|max:50',
        'nama_belakang' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);
    
    $fullName = $request->nama_depan . ' ' . $request->nama_belakang;

    $user = User::create([
        'nama' => $fullName,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('/');
}
}
