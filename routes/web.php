<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('main.login');
});

Route::get('/Dashboard', function () {
    return view('sideBar');
});

