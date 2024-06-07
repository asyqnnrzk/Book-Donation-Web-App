<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('book', [App\Http\Controllers\BookController::class]);


Route::get('/', function () {
    return view('home');
});

Route::get('/admin_page', function () {
    return view('admin_page');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/donated_book', function () {
    return view('donated_book');
}) -> name('donated.book');

Route::get('/sell_book', function () {
    return view('sell_book');
}) -> name('purchased.book');

Route::get('/report', function () {
    return view('report');
});