<?php

use App\Http\Controllers\CheckoutController;
use App\Models\Destination;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\Admin\Auth\AdminPasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\AdminNewPasswordController;
use App\Http\Controllers\ReviewController;


Route::get('/', [HomeController::class, 'index'])->name('home');;
Route::get('/package', [PackageController::class, 'index']);
Route::get('/about', function () {return view('about');});
Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{slug}', [DestinationController::class, 'show']);
Route::get('/autocomplete', [SearchController::class, 'autocomplete']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/event', [EventController::class, 'index']);
Route::get('/event/{slug}', [EventController::class, 'show'])->name('events.show');


Route::middleware('guest')->group(function () {
    Route::get('/register', [SignUpController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [SignUpController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{id}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/process/{id}', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/checkout/update-status-success/{order_id}', [CheckoutController::class, 'updateStatusOnSuccess'])->name('checkout.updateStatusOnSuccess');
    Route::post('/checkout/update-status/{order_id}', [CheckoutController::class, 'updateStatusOnSuccess'])->name('checkout.updateStatus');
    
    Route::get('/account/settings', [UserController::class, 'setting'])->name('account.settings');
    Route::post('/account/settings', [UserController::class, 'update'])->name('account.update');
    
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/pesanan', [OrderController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/{transaction}', [OrderController::class, 'show'])->name('pesanan.show');
    Route::post('/pesanan/{transaction}/update-status', [OrderController::class, 'updateStatus'])->name('pesanan.updateStatus');
    Route::delete('/pesanan/{transaction}', [OrderController::class, 'destroy'])->name('pesanan.destroy');
    Route::resource('package', AdminPackageController::class);
});


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/destination-data', [DestinationController::class, 'data'])->name('Destinations');
    Route::get('/admin/destination/create', [DestinationController::class, 'create'])->name('create');
    Route::post('/admin/destination/create', [DestinationController::class, 'store'])->name('store');
    Route::get('/admin/destination/{id}/edit', [DestinationController::class, 'edit'])->name('edit');
    Route::put('/admin/destination/{id}', [DestinationController::class, 'update'])->name('update');
    Route::delete('/admin/destination/{id}', [DestinationController::class, 'delete'])->name('destination.delete');
    Route::get('/admin/userControl', [AdminUserController::class, 'index'])->name('user.control');
    Route::get('/admin/settings', [AdminController::class, 'showSetting'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'update'])->name('admin.update');
    
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('/admin/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
    Route::get('/admin/event', [EventController::class, 'adminIndex'])->name('admin.event.index');
    Route::get('/admin/event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/admin/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/admin/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
});


Route::get('/admin', [AdminController::class, 'showloginForm'])->name('adminFormLogin');
Route::post('/login/admin', [AdminController::class, 'login'])->name('adminLogin');
Route::get('/register/admin', [AdminController::class, 'showRegisterForm'])->name('adminRegister.form');
Route::post('/register/admin', [AdminController::class, 'register'])->name('adminRegister');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');




Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/forgot-password', [AdminPasswordResetLinkController::class, 'create'])->name('admin.password.request');
    Route::post('/forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('admin.password.email');
    Route::get('/admin/reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('admin.password.reset');
    Route::post('/reset-password', [AdminNewPasswordController::class, 'store'])->name('admin.password.update');
});


Route::post('/midtrans/notification', [CheckoutController::class, 'notificationHandler'])->name('midtrans.notification');



