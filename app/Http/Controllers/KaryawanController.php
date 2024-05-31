<?php

namespace App\Http\Controllers;


use App\Models\Karyawan;
use App\Models\User;
use APP\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function karyawan(Request $request) 
    {
        $users = User::all();

        $searchTerm = $request->input('search');

        $users = User::when($searchTerm, function($query, $searchTerm) {
            return $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        })->get();
        
        

        return view('main.main', [
            'header' => 'Karyawan',
            'contentName' => 'karyawan', 
        ], compact('users', 'searchTerm'));

    }

    // private function calculateWorkingDays($starting_date)
    // {
    //     if ($starting_date) {
    //         $starting_date = Carbon::parse($starting_date);
    
    //         if ($starting_date->isPast()) {
    //             $now = Carbon::now();
    //             $diffInWeekdays = $now->diffInWeekdays($starting_date);
    
    //             return $diffInWeekdays;
    //         } else {
    //             return 0;
    //         }
    //     }
    // }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = User::make($request->all(), [
            'actual_username' => 'required|string|max:255',
            'actual_email' => 'required|email|unique:users,email',
            'actual_password' => 'required|min:6',
            'roles_id' => 'required|exists:roles,id',
        ]);

        // Simpan user ke database
        $user = User::create([
            'name' => $request->actual_username,
            'email' => $request->actual_email,
            'password' => Hash::make($request->actual_password),
            'roles_id' => $request->roles_id,
            'starting_date' => $request->starting_date
        ]);

        // Redirect atau lakukan sesuatu setelah registrasi berhasil
        return redirect()->route('karyawan')->with('success', 'Registration successful!');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::all();

        $record = User::find($id);
        $startingDate = $record ? $record->starting_date : null;
        // dd($startingDate);

        
        $user = User::findOrFail($id);
        
        return view('main.main', [
            'header' => 'Edit Data Users',
            'contentName' => 'edit-karyawan', 
        ], compact('user', 'startingDate'));
    }

    public function editPassword($id, Request $request)
    {
        $users = User::all();

        // $validator = User::make($request->all(), [
        //     'current_password' => 'required',
        //     'new_password' => 'required|min:8|confirmed',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // if (!Hash::check($request->current_password, Auth::user()->password)) {
        //     return redirect()->back()->with('error', 'Current password is incorrect.');
        // }

        // Auth::user()->update(['password' => Hash::make($request->new_password)]);

        // return redirect()->back()->with('success', 'Password successfully changed.');


        $record = User::find($id);
        $startingDate = $record ? $record->starting_date : null;
        // dd($startingDate);

        
        $user = User::findOrFail($id);
        
        return view('main.main', [
            'header' => 'Edit Data Users',
            'contentName' => 'edit-password-karyawan', 
        ], compact('user', 'startingDate'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $user = User::findOrFail($id);


        $validator = User::make($request->all(), [
            'username' => 'required|string|max:255',
            'roles_id' => 'required|exists:roles,id',
        ]);

            $user->name = $request->name;
            $user->roles_id = $request->roles_id;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->birthplace = $request->birthplace;
            $user->date_of_birth = $request->date_of_birth;
            $user->gender = $request->gender;
            $user->starting_date = $request->starting_date;

            $user->save();

        return redirect('/main/karyawan')->with('success', 'User updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,$id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/main/karyawan')->with('success', 'User updated successfully!');
    }
}
