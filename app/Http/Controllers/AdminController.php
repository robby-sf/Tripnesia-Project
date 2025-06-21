<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin.Login');
    }
    public function showRegisterForm()
    {
        return view('Admin.Register');
    }
    public function showSetting()
    {
        return view('Admin.Setting')->with('admin', Auth::guard('admin')->user());
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
                'admin_id' => $admin->id,
                'admin_name' => $admin->nama,
                'admin_role' => $admin->role,
            ]);

            
            return redirect()->intended('/admin');
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
            'email' => 'required|email|unique:admins,email',
            'alamat'=> 'required|string|max:100',
            'tanggal_lahir'=> 'required|date|max:100',
            'nomor_telp'=> 'required|string|max:15|regex:/^\+?[0-9]+$/',
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

    public function update(Request $request)
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'nomor_telp' => 'nullable|string|max:15|regex:/^\+?[0-9]+$/',
            'alamat' =>'required|string|max:250',
            'tanggal_lahir' => 'required|date|max:100',
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update data dasar
        $admin->nama = $validated['nama'];
        $admin->email = $validated['email'];
        $admin->nomor_telp = $validated['nomor_telp'] ?? null;
        $admin->alamat = $validated['alamat'];
        $admin->tanggal_lahir = $validated['tanggal_lahir'];

        // Update password jika ada
        if (!empty($validated['password'])) {
            $admin->password = Hash::make($validated['password']);
        }

        // Hapus foto jika diminta
        if ($request->has('hapus_foto')) {
            $admin->profile_picture = 'profileKosong.jpg';
        }

        // Upload foto jika ada
        if ($request->hasFile('profile_picture')) {
            
            $file = $request->file('profile_picture');

            $destination = public_path('storage/Asset');
            $filename = $request->file('profile_picture')->hashName();
            $file->move($destination, $filename);
            // $request->file('profilePicture')->storeAs('Asset', $filename, 'public');
            $admin->profile_picture = $filename;
        }

        $admin->save();

        return redirect()->route('admin.settings')->with('success', 'Data berhasil diperbarui.');
    }

    
}
