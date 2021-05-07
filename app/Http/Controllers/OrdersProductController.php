<?php

namespace App\Http\Controllers;

use App\Models\OrdersProduct;
use Illuminate\Http\Request;

class OrdersProductController extends Controller
{
    private $op;

    public function __construct(OrdersProduct $op)
    {
        $this->op = $op;
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'qtt' => 'required|numeric|gt:0',
        ]);

        $request['order_id'] = $id;

        return $this->op::create($request->all());
    }
}
