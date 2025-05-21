<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/package', function () {
    return view('package');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin2', function () {
    return view('admin2');
});

Route::get('/admin', function () {
    return view('admin',['title' => 'Dashboard']);
});

Route::get('/admin/pesanan', function () {
    return view('pesanan',['title' => 'Pesanan']);
});

Route::get('/admin/data-wisata', function () {
    return view('dataWisata',['title' => 'Data Wisata']);
});

Route::get('/sign-up', function () {
    return view('SignUp',['title' => 'Dashboard']);
});

Route::get('/login', function () {
    return view('Login',['title' => 'Dashboard']);
});
