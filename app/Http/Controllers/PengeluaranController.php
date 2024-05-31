<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $pengeluaran = new Pengeluaran(); // Sesuaikan dengan model Anda
        $pengeluaran->items_name = $request->items_name;
        $pengeluaran->items_price = $request->items_price;
        $pengeluaran->items_quantity = $request->items_quantity;
        $pengeluaran->items_info = $request->items_info;
        $pengeluaran->items_total = $request->items_total;
        $pengeluaran->save();

        return redirect('/main/laporan
        ')->with('status', 'Pengeluaran Berhasil Ditambahkan');


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
        $pengeluaran = Pengeluaran::findOrFail($id);

        return view('main.main', [
            'header' => 'Edit Pengeluaran',
            'contentName' => 'edit-pengeluaran',
        ], compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        
        $pengeluaran->items_name = $request->items_name;
        $pengeluaran->items_price = $request->items_price;
        $pengeluaran->items_quantity = $request->items_quantity;
        $pengeluaran->items_info = $request->items_info;
        $pengeluaran->items_total = $request->items_total;
        $pengeluaran->save();

        return redirect('/main/laporan')->with('status', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect('/main/laporan')->with('status', 'Data Berhasil Dihapus');
    }
}
