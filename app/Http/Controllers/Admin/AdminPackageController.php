<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPackageController extends Controller
{
    /**
     * Menampilkan semua paket.
     */
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        // PATH DIUBAH: dari 'admin.packages' menjadi 'admin.package'
        return view('admin.package.AdminPackage', compact('packages'));
    }

    /**
     * Menampilkan form tambah paket.
     */
    public function create()
    {
        // PATH DIUBAH: dari 'admin.packages' menjadi 'admin.package'
        return view('admin.package.CreatePackage');
    }

    /**
     * Menyimpan paket baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tickets' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('packages', 'public');

        Package::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'tickets' => $request->tickets,
        ]);

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit paket.
     */
    public function edit(Package $package)
    {
        // PATH DIUBAH: dari 'admin.packages' menjadi 'admin.package'
        return view('admin.package.EditPackage', compact('package'));
    }

    /**
     * Mengupdate paket di database.
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tickets' => 'required|string|max:255',
        ]);

        $imagePath = $package->image;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($package->image);
            $imagePath = $request->file('image')->store('packages', 'public');
        }

        $package->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'tickets' => $request->tickets,
        ]);

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Menghapus paket dari database.
     */
    public function destroy(Package $package)
    {
        Storage::disk('public')->delete($package->image);
        $package->delete();

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}
