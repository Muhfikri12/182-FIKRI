<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengeluaran;
use App\Models\Roles;
use Illuminate\Support\Carbon;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::attempt ($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}

