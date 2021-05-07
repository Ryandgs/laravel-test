<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'qtt',
    ];

    public function order()
    {
        $this->belongsTo(Orders::class);
    }

    public function product()
    {
        $this->hasMany(Products::class);
    }
}
