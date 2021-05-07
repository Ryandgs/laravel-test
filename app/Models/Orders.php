<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'note',
        'payment',
        'costumer_id'
    ];

    public function costumer()
    {
        $this->belongsTo(Costumers::class);
    }

    public function products()
    {
        $this->belongsToMany(Products::class, 'orders_products')->withPivot('');
    }
}
