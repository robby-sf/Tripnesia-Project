<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\log;

class UserController extends Controller
{
    public function setting()
    {
        return view('User.userSetting')->with('user', Auth::guard('web')->user());
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('web')->user();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nomorTelp' => 'nullable|string|max:15|regex:/^\+?[0-9]+$/',
            'password' => 'nullable|string|min:8',
            'profilePicture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->nomorTelp = $validated['nomorTelp'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        if ($request->has('hapus_foto')) {
            $user->profilePicture = 'profileKosong.jpg';
        }

        if ($request->hasFile('profilePicture')) {
            
            $file = $request->file('profilePicture');

            $destination = public_path('storage/Asset');
            Log::info('File received: ' . json_encode([
                'originalName' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'isValid' => $file->isValid(),
            ]));
            Log::error("Tidak ada file 'profilePicture' yang dikirim.", ['requestKeys' => $request->allFiles()]);
            Log::info('Path:', ['path' => $file->getPathname()]);
            $filename = $request->file('profilePicture')->hashName();
            $file->move($destination, $filename);
            $user->profilePicture = $filename;
        }

        $user->save();

        return redirect()->route('account.settings')->with('success', 'Data berhasil diperbarui.');
    }
}
