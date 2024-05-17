<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('homepage.Home');
    }

    public function login()
    {
        return view('main.login');
    }

    public function dashboard()
    {
        return view('sideBar');
    }

    public function main()
    {
        return view('main.main', [
            'header' => 'Dashboard',
            'contentName' => 'content',
        ]);
    }

    public function transaksi()
    {
        return view('main.main', [
            'header' => 'Transaksi',
            'contentName' => 'transaksi',
        ]);
    }

    public function pelanggan()
    {
        return view('main.main', [
            'header' => 'Pelanggan',
            'contentName' => 'pelanggan',
        ]);
    }

    public function laporan() 
    {
        return view('main.main', [
            'header' => 'Laporan',
            'contentName' => 'laporan', 
        ]);
    }
}
