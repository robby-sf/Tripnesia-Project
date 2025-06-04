<?php

use App\Models\Destination;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('index');
});

Route::get('/Page', function () {
    return view('Page');
});

Route::get('/destination', function () {
    return view('destination');
});


Route::get('/package', [PackageController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin2', function () {
    return view('admin2');
});

Route::get('/admin', function () {
    return view('admin', ['title' => 'Dashboard']);
});

Route::get('/admin/pesanan', function () {
    return view('pesanan', ['title' => 'Pesanan']);
});

Route::get('/admin/data-wisata', function () {
    return view('dataWisata', ['title' => 'Data Wisata']);
});


Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{slug}', [DestinationController::class, 'show']);

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

Route::get('/register', [SignUpController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [SignUpController::class, 'register'])->name('register');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{slug}', [EventController::class, 'show']);
