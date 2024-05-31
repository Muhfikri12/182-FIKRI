<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function detailLaporan()
    {
        $transactions = Transactions::all();

        
        
        // Ambil total count dari customer
        $customers = DB::table('transactions')
        ->selectRaw('DATE(created_at) as date, COUNT(id) as total_sum_cust')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get()
        ->keyBy('date');
        
        // Ambil total sum dari quantity
        $quantities = DB::table('transactions')
        ->selectRaw('DATE(created_at) as date, SUM(quantity) as total_sum_qty')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get()
        ->keyBy('date');
        
        // Ambil total sum dari total
        $totals = DB::table('transactions')
        ->selectRaw('DATE(created_at) as date, SUM(total) as total_sum')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get()
        ->keyBy('date');

        //  Total Pengeluaran harian
        $expenseTotal = DB::table('pengeluarans')
        ->selectRaw('DATE(created_at) as date, SUM(items_total) as items_total')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get()
        ->keyBy('date');
        
        // Gabungkan hasil
        $combined = collect();
        $cumulativeTotal = 0;
        $dates = $totals->keys()->merge($customers->keys())->merge($quantities->keys())->unique()->sort();

        

        foreach ($dates as $date) {
            $total_sum = $totals->has($date) ? $totals[$date]->total_sum : 0;
            $items_total = $expenseTotal->has($date) ? $expenseTotal[$date]->items_total : 0;
            $total_sum_cust = $customers->has($date) ? $customers[$date]->total_sum_cust : 0;
            $total_sum_qty = $quantities->has($date) ? $quantities[$date]->total_sum_qty : 0;
            $combined_total = $total_sum - $items_total;

            $cumulativeTotal += $combined_total;

            $combined->push([
                'date' => $date,
                'total_sum' => $total_sum,
                'total_sum_cust' => $total_sum_cust,
                'total_sum_qty' => $total_sum_qty,
                'expenseTotal' => $items_total,
                'combined_total' => $combined_total,
                'cumulative_total' => $cumulativeTotal,
            ]);
        }


        

        $pengeluarans = Pengeluaran::all();

    return view('main.main', [
        'header' => 'Detail Laporan',
        'contentName' => 'detail-laporan-kas'
    ], compact('transactions', 'pengeluarans', 'combined'));

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
}


