<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pelanggan(Request $request)
    {
        $searchTerm = $request->input('search');
        
        if($request->has('search')){
            $pelanggan = Transactions::where('name', 'LIKE', '%'. $request->search. '%')->get();
        } else {
            $pelanggan = Transactions::all();
        }        
        
        $pelanggan = Transactions::where('name', 'like', "%$searchTerm%")->orderBy('created_at', 'desc')->get();


        // $user = User::with('transactions')->get();

        return view('main.main', [
            'header' => 'Pelanggan',
            'contentName' => 'pelanggan',
        ], compact('pelanggan'));

        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function transaksi()
    {
        $kasir = User::where('roles_id', 2)->get();
        // $userlist = User::all();

        return view('main.main', [
            'header' => 'Transaksi',
            'contentName' => 'transaksi',
        ], compact('kasir'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $transaction = new Transactions;
        $transaction->name = $request->customer_name;
        $transaction->id_cashier = $request->id_cashier;
        $transaction->address = $request->address;
        $transaction->phone_number = $request->phone_number;
        $transaction->services = $request->services;
        $transaction->price = $request->price;
        $transaction->quantity = $request->quantity;
        $transaction->total = $request->total;
        $transaction->pay_method = $request->pay_method;
        $transaction->save();
        

        return redirect('/main/pelanggan')->with('status', 'Data Berhasil Ditambahkan');
        



        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $pelanggan = Transactions::findOrFail($id);

        return view('main.main', [
            'header' => 'Edit Pelanggan',
            'contentName' => 'editpelanggan',
        ], compact('pelanggan'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transaction, $id)
    {
        $transaction = Transactions::findOrFail($id);
        
        $transaction->name = $request->customer_name;
        $transaction->id_cashier = $request->id_cashier;
        $transaction->address = $request->address;
        $transaction->phone_number = $request->phone_number;
        $transaction->services = $request->services;
        $transaction->price = $request->price;
        $transaction->quantity = $request->quantity;
        $transaction->total = $request->total;
        $transaction->pay_method = $request->pay_method;
        
  
        $transaction->save();

        return redirect('/main/pelanggan')->with('status', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Transactions::findOrFail($id);
        $pelanggan->delete();

        return redirect('/main/pelanggan')->with('status', 'Data Berhasil Dihapus');
    }

      
}
