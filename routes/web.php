<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage.Home');
});

Route::get('/login', function () {
    return view('main.login');
});

Route::get('/Dashboard', function () {
    return view('sideBar');
});

Route::get('/main', function () {
    return view('main.main', [
        'header' => 'Dashboard',
        'contentName' => 'content', 
    ]);
});

Route::get('/main/transaksi', function () {
    return view('main.main', [
        'header' => 'Transaksi',
        'contentName' => 'transaksi', 
    ]);
});

Route::get('/main/laporan', function () {
    return view('main.main', [
        'header' => 'Laporan',
        'contentName' => 'laporan', 
    ]);
});





