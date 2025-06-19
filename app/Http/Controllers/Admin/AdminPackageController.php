<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.package.AdminPackage', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.CreatePackage');
    }

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

    public function edit(Package $package)
    {
        return view('admin.package.EditPackage', compact('package'));
    }

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

    public function destroy(Package $package)
    {
        Storage::disk('public')->delete($package->image);
        $package->delete();

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}
