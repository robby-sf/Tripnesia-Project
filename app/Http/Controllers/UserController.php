<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function setting()
    {
        return view('User.userSetting')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nomorTelp' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update data dasar
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->nomorTelp = $validated['nomorTelp'] ?? null;

        // Update password jika ada
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Hapus foto jika diminta
        if ($request->has('hapus_foto')) {
            $user->profilePicture = 'profileKosong.jpg';
        }

        // Upload foto jika ada
        if ($request->hasFile('profilePicture')) {

            $filename = $request->file('profilePicture')->hashName();
            $request->file('profilePicture')->storeAs('Asset', $filename, 'public');
            $user->profilePicture = $filename;
        }

        $user->save();

        return redirect()->route('account.settings')->with('success', 'Data berhasil diperbarui.');
    }
}
