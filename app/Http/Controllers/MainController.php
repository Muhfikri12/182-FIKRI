<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Roles;
use Illuminate\Support\Carbon;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        // $Role = Roles::all();
        // $User = Transactions::all();
        return view('homepage.Home');
    }


   

    public function main()
    {
        
        $customer = Transactions::orderBy('created_at', 'desc')->take(6)->get();;
        
        $totalTransaksi = DB::table('transactions')
        ->select(DB::raw('SUM(total) as total_transaksi'))
        ->whereDate('created_at', now()->format('Y-m-d'))
        ->first();

        $totalPelanggan = DB::table('transactions')
        ->select(DB::raw('COUNT(id) as total_pelanggan'))
        ->whereDate('created_at', now()->format('Y-m-d'))
        ->first();

        $totalQuantity = DB::table('transactions')
        ->select(DB::raw('sum(quantity) as total_quantity'))
        ->whereDate('created_at', now()->format('Y-m-d'))
        ->first();

        $totalKemarin = DB::table('transactions')
        ->select(DB::raw('SUM(total) as total_transaksi_kemarin'))
        ->whereDate('created_at', Carbon::yesterday()->format('Y-m-d'))
        ->first();
        

        return view('main.main', [
            'header' => 'Dashboard',
            'contentName' => 'content',
        ], compact('totalTransaksi', 'totalPelanggan', 'totalQuantity', 'totalKemarin', 'customer'));
    }



    // public function pelanggan()
    // {
    //     return view('main.main', [
    //         'header' => 'Pelanggan',
    //         'contentName' => 'pelanggan',
    //     ]);
    // }

    public function laporan() 
    {
        // Penghitungan total pemasukan perbulan 
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $transaksi = Transactions::where('created_at', '>=', $startOfMonth)->get();
        $expense = Pengeluaran::where('created_at', '>=', $startOfMonth)->get();

        // Berdasarkan Omset 
        $totalAmount = Transactions::sum('total');
        $formattedTotalAmount = number_format($totalAmount, 0, ',', '.');

        // Berdasarkan Pelanggan
        $totalCustomerRepot = Transactions::count('id');

        // Berdasarkan Quantity
        $totalQuantityCustomer = Transactions::sum('quantity');

        // Berdasarkan Pengeluaran
        $totalExpense = Pengeluaran::sum('items_total');
        $formattedTotalexpense = number_format($totalExpense, 0, ',', '.');

        $totalTransaksiBulanLaluExpense = DB::table('pengeluarans')
        ->select(DB::raw('SUM(items_total) as total_transaksi_bulan_lalu_expense'))
        ->whereMonth('created_at', Carbon::now()->subMonth()->format('m'))
        ->first();
      
        $totalTransaksiBulanIniExpense = DB::table('pengeluarans')
            ->select(DB::raw('SUM(items_total) as total_transaksi_bulan_ini_expense'))
            ->whereMonth('created_at', Carbon::now()->format('m'))

            ->first();

        
        $totalTransaksiBulanLaluExpenseNilai = $totalTransaksiBulanLaluExpense->total_transaksi_bulan_lalu_expense ?? 0;
        $totalTransaksiBulanIniExpenseNilai = $totalTransaksiBulanIniExpense->total_transaksi_bulan_ini_expense ?? 0;
        
        if ($totalTransaksiBulanLaluExpenseNilai == 0) {
            $totalTransaksiBulanLaluExpenseNilai = 1;
        }
        $persentaseExpense = ($totalTransaksiBulanIniExpenseNilai/ $totalTransaksiBulanLaluExpenseNilai) * 100;

    // Menghitung Transaksi 

        $totalTransaksiBulanLaluQuantity = DB::table('transactions')
        ->select(DB::raw('SUM(quantity) as total_transaksi_bulan_lalu'))
        ->whereMonth('created_at', Carbon::now()->subMonth()->format('m'))
        ->first();
        
    
        // Mendapatkan total transaksi bulan ini
        $totalTransaksiBulanIniQuantity = DB::table('transactions')
            ->select(DB::raw('SUM(quantity) as total_transaksi_bulan_ini'))
            ->whereMonth('created_at', Carbon::now()->format('m'))
            ->first();

        $totalBulanLaluQuantity = $totalTransaksiBulanLaluQuantity->total_transaksi_bulan_lalu ?? 0;
        $totalBulanIniQuantity = $totalTransaksiBulanIniQuantity->total_transaksi_bulan_ini ?? 0;
        
        $persentaseKg = ($totalBulanIniQuantity/ $totalBulanLaluQuantity) * 100;

        // Berdasarkan Total Customer

        $totalTransaksiBulanLaluCustomer = DB::table('transactions')
        ->select(DB::raw('COUNT(name) as total_transaksi_bulan_lalu_Customer'))
        ->whereMonth('created_at', Carbon::now()->subMonth()->format('m'))
        ->first();
        
        
        // Mendapatkan total transaksi bulan ini
        $totalTransaksiBulanIniCustomer = DB::table('transactions')
        ->select(DB::raw('COUNT(name) as total_transaksi_bulan_ini_customer'))
        ->whereMonth('created_at', Carbon::now()->format('m'))
        ->first();
        
        // Menghitung perbedaan transaksi
        $totalBulanLaluCustomer = $totalTransaksiBulanLaluCustomer->total_transaksi_bulan_lalu_Customer ?? 0;
        $totalBulanIniCustomer = $totalTransaksiBulanIniCustomer->total_transaksi_bulan_ini_customer ?? 0;
        
        $persentaseCust = ($totalBulanIniCustomer/ $totalBulanLaluCustomer) * 100;

        // Berdasarkan Pendapatan

        $totalTransaksiBulanLaluTotal = DB::table('transactions')
        ->select(DB::raw('SUM(total) as total_transaksi_bulan_lalu_total'))
        ->whereMonth('created_at', Carbon::now()->subMonth()->format('m'))
        ->first();
        
        
        // Mendapatkan total transaksi bulan ini
        $totalTransaksiBulanIniTotal = DB::table('transactions')
        ->select(DB::raw('SUM(total) as total_transaksi_bulan_ini_total'))
        ->whereMonth('created_at', Carbon::now()->format('m'))
        ->first();
        
        // Menghitung perbedaan transaksi
        $totalBulanLaluTotal = $totalTransaksiBulanLaluTotal->total_transaksi_bulan_lalu_total ?? 0;
        $totalBulanIniTotal = $totalTransaksiBulanIniTotal->total_transaksi_bulan_ini_total ?? 0;
        
        $persentaseTotal = ($totalBulanIniTotal/ $totalBulanLaluTotal) * 100;

        $pengeluaran = Pengeluaran::orderBy('created_at', 'desc')->get();

        // Menghitung Pemasukan
        // Menghitung Nilai Kemaren


        $daysBack = 30;

        $today = now()->format('Y-m-d');

        $startDate = now()->subDays($daysBack)->format('Y-m-d');

        $endDate = now()->subDay()->format('Y-m-d');

        $totalExpense = DB::table('pengeluarans')
            ->select(DB::raw('SUM(items_total) as expense_value'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

            $expenseValue = $totalExpense->expense_value ?? 0;

        $totalYesterdayTransaction = DB::table('transactions')
            ->select(DB::raw('SUM(total) as total_yesterday_value'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

            $totalYesterdayValue = $totalYesterdayTransaction->total_yesterday_value ?? 0;
            // dd($totalYesterdayValue);


        // Menghitung Nilai Sekarang
        $totalTransaksi = DB::table('transactions')
            ->select(DB::raw('SUM(total) as total_transaksi'))
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->first();

        $totalTransaksiValue = $totalTransaksi->total_transaksi ?? 0;


        $totalExpense = DB::table('pengeluarans')
            ->select(DB::raw('SUM(items_total) as total_expense'))
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->first();

        $totalExpenseValue = $totalExpense->total_expense ?? 0;

        $valueYestedayCash = $totalYesterdayValue - $expenseValue;
        $valueNowCash = $totalTransaksiValue - $totalExpenseValue;

        $valueCashYesterday = $valueYestedayCash + $valueNowCash;

        $valueCash = $valueNowCash + $valueCashYesterday;

        $valueCashFormat = number_format($valueCash, 0, ',', '.');

        // dd($totalTransaksiValue);

        return view('main.main', [
            'header' => 'Laporan',
            'contentName' => 'laporan', 
        ],compact('pengeluaran', 'formattedTotalAmount', 'totalCustomerRepot', 'totalQuantityCustomer', 'persentaseKg', 'persentaseCust', 'persentaseTotal', 'formattedTotalexpense', 'persentaseExpense', 'totalTransaksi', 'totalTransaksiValue', 'totalExpenseValue', 'valueCashYesterday', 'valueCashFormat'));
    }

    
}
