<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    
    public function cashier()
    {
        return $this->belongsTo(User::class, 'id_cashier');
    }

    public static function getDailyTotalsCustomer()
    {
        return static::selectRaw('DATE(created_at) as date, COUNT(id) as total')
                    ->groupBy('date')
                    ->orderBy('date', 'desc')
                    ->get();
    }


    public static function getDailyTotalsQuantity()
    {
        return static::selectRaw('DATE(created_at) as date, SUM(quantity) as total')
                    ->groupBy('date')
                    ->orderBy('date', 'desc')
                    ->get();

    }

    public static function getDailyTotalsTotal()
    {
        return static::selectRaw('DATE(created_at) as date, SUM(total) as total')
                    ->groupBy('date')
                    ->orderBy('date', 'desc')
                    ->get();

    }

    public static function getDailyTotalsExpenses()
    {
        return static::selectRaw('DATE(transactions.created_at) as date, SUM(transactions.quantity) as total_quantity, SUM(pengeluarans.items_total) as total_other_value')
            ->Join('pengeluarans', 'transactions.created_at', '=', 'pengeluarans.created_at')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();
    }
}

