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
    Route::resource('admin/rooms', App\Http\Controllers\AdminRoomController::class);
});

// Booking page route - displays the multi-step booking form
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index']);

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
