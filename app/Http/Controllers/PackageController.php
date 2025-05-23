<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package; // Import model Package

class PackageController extends Controller
{
    public function index()
    {
        // Ambil semua paket dari database
        $packages = Package::all();

        // Kirim data ke view
        return view('package', compact('packages'));
    }
}
