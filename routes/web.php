<?php

use App\Http\Controllers\detailLaporan;
use App\Http\Controllers\DetailLaporanController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Models\Pelanggan;

Route::get('/', [MainController::class, 'home']);

Route::get('/login', function(){
    return view('main.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

route::group(['middleware' => ['auth']], function(){
    
    Route::get('/main/pelanggan', [PelangganController::class, 'pelanggan'])->name('pelanggan-search');
    Route::post('/main/pelanggan', [PelangganController::class, 'store'])->name('transaksi.store');
    Route::get('/transactions/{id}/edit', [PelangganController::class, 'edit'])->name('transactions.edit');
    Route::put('/transactions/{id}', [PelangganController::class, 'update'])->name('transactions.update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    
    Route::get('/main/karyawan', [KaryawanController::class, 'karyawan'])->name('karyawan');
    Route::post('/main/tambah/users', [KaryawanController::class, 'store'])->name('register.store');
    Route::get('/users/{id}/edit', [KaryawanController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [KaryawanController::class, 'update'])->name('users_update');
    Route::delete('/users/{id}', [KaryawanController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/edit/password', [KaryawanController::class, 'editPassword'])->name('users.edit.password');

    Route::get('/main/detail/laporan', [DetailLaporanController::class, 'detailLaporan'])->name('detail-report');
    


    Route::get('/main', [MainController::class, 'main'])->name('dashboard');

    Route::get('/main/laporan', [MainController::class, 'laporan']);
    Route::post('/main/laporan', [PengeluaranController::class, 'store'])->name('pengeluaran');
    Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

    
    Route::get('/main/transaksi', [PelangganController::class, 'transaksi'])->name('transaksi');

    // Route::post('/main/transaksi', [TransactionController::class, 'submitForm']);

    Route::get('/main/roles', [RoleController::class, 'roles']);

});




// Route::get('/', [FormController::class, 'showForm']);
Route::post('/submit', [FormController::class, 'handleSubmit']);


// Route::get('/Dashboard', [MainController::class, 'dashboard']);








