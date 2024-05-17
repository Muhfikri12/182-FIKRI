<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home']);

Route::get('/login', [MainController::class, 'login']);

Route::get('/Dashboard', [MainController::class, 'dashboard']);

Route::get('/main', [MainController::class, 'main']);

Route::get('/main/transaksi', [MainController::class, 'transaksi']);

Route::get('/main/pelanggan', [MainController::class, 'pelanggan']);

Route::get('/main/laporan', [MainController::class, 'laporan']);









