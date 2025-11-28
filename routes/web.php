<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes for Hotel Elyra
|--------------------------------------------------------------------------
| 
| 
| Each route returns a Blade view template for the corresponding page.
|
*/

// Home page route - displays the theme selection screen
Route::get('/', function () {
    return view('home');
});

// Rooms page route - displays available rooms based on selected theme
Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index']);

// Room detail page route - shows a single room in detail
Route::get('/room', [App\Http\Controllers\RoomController::class, 'show']);

// Admin Routes
// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        $theme = request()->query('theme', 'solice');
        return view('admin.dashboard', compact('theme'));
    })->name('admin.dashboard');

    Route::resource('admin/rooms', App\Http\Controllers\AdminRoomController::class)->names([
        'index' => 'admin.rooms.index',
        'create' => 'admin.rooms.create',
        'store' => 'admin.rooms.store',
        'show' => 'admin.rooms.show',
        'edit' => 'admin.rooms.edit',
        'update' => 'admin.rooms.update',
        'destroy' => 'admin.rooms.destroy',
    ]);
    Route::resource('admin/bookings', App\Http\Controllers\AdminBookingController::class)->names([
        'index' => 'admin.bookings.index',
        'create' => 'admin.bookings.create',
        'store' => 'admin.bookings.store',
        'show' => 'admin.bookings.show',
        'edit' => 'admin.bookings.edit',
        'update' => 'admin.bookings.update',
        'destroy' => 'admin.bookings.destroy',
    ]);
});

// Booking page route - displays the multi-step booking form
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index']);
Route::post('/booking', [App\Http\Controllers\BookingController::class, 'store']);

// Contact page route - displays contact form and hotel information
Route::get('/contact', function () {
    return view('contact');
});

// Cart and Checkout routes
Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});
