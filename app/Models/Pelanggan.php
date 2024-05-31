<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'customer_name', 
        'id_cashier', 
        'address', 
        'phone_number', 
        'services', 
        'price', 
        'quantity', 
        'total', 
        'pay_method', 
        'money'
    ];
}
