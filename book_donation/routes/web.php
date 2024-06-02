<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/input_book', function () {
    return view('input_book');
});

Route::get('/sell_book', function () {
    return view('sell_book');
});

Route::get('/report', function () {
    return view('report');
});