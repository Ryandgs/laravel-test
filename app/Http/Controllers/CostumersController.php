<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use Illuminate\Http\Request;

class CostumersController extends Controller
{
    private $costumers;

    public function __construct(Costumers $costumers)
    {
        $this->costumers = $costumers;
    }

    public function index()
    {
        return $this->costumers->paginate(10);
    }

    public function show($id)
    {
        return $this->costumers::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'document' => 'required|unique:costumers',
            'gender' => 'required|in:M,F,O',
            'email' => 'required|email',
        ]);

        return $this->costumers::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F,O',
            'email' => 'required|email',
        ]);

        $costumer = $this->costumers->find($id);
        $costumer->update($request->except('document'));

        return $request->all();
    }

    public function destroy($id)
    {
        $costumer = $this->costumers::find($id);

        return $costumer->delete();
    }
}
