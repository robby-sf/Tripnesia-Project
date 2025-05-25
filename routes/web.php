<?php

use App\Models\Destination;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

Route::get('/', function () {
    return view('index');
});

Route::get('/Page', function () {
    return view('Page');
});

Route::get('/destination', function () {
    return view('destination');
});

Route::get('/event', function () {
    return view('event');
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

Route::get('/sign-up', function () {
    return view('SignUp', ['title' => 'Dashboard']);
});

Route::get('/login', function () {
    return view('Login', ['title' => 'Dashboard']);
});

Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{slug}', [DestinationController::class, 'show']);
