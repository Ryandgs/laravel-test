<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    private $orders;

    private $eval = [
        'payment' => 'required|in:M,CC,DC',
        'costumer_id' => 'required',
    ];

    public function __construct(Orders $orders)
    {
        $this->orders = $orders;
    }

    public function index()
    {
        return $this->orders->paginate(10);
    }

    public function show($id)
    {
        return $this->orders::find($id);
    }

    public function store(Request $request)
    {
        $request->validate($this->eval);

        return $this->orders::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->eval);

        $order = $this->orders->find($id);
        $order->update($request->except('document'));

        return $request->all();
    }

    public function destroy($id)
    {
        $order = $this->orders::find($id);

        return $order->delete();
    }

    public function report($id)
    {

    }
}
