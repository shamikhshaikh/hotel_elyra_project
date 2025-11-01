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
Route::get('/rooms', function () {
    return view('rooms');
});

// Booking page route - displays the multi-step booking form
Route::get('/booking', function () {
    return view('booking');
});

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

// Room detail page route - shows a single room in detail
Route::get('/room', function () {
    return view('room_detail');
});
