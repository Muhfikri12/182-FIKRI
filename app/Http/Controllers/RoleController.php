<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roles()
    {
        $roles = DB::table('roles')->get();
        dd($roles) ;
        
        
    }
}
