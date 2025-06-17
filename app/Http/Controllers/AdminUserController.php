<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all(); // variabel $users lebih baik jamak
        return view('Admin.User', compact('users'));
    }
}
