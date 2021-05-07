<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $products;

    private $eval = [
        'name' => 'required',
        'color' => 'required',
        'size' => 'required|in:P,M,G',
        'value' => 'required|numeric|gt:0',
    ];

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        return $this->products->paginate(10);
    }

    public function show($id)
    {
        return $this->products::find($id);
    }

    public function store(Request $request)
    {
        $request->validate($this->eval);

        return $this->products::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->eval);

        $product = $this->products->find($id);
        $product->update($request->all());

        return $request->all();
    }

    public function destroy($id)
    {
        $product = $this->products::find($id);

        return $product->delete();
    }
}
