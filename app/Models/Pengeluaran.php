<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
        'items_name', 'items_price', 'items_quantity', 'items_info', 'items_total'
    ];

    protected $table = 'pengeluarans';
}


