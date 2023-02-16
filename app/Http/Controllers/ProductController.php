<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        return Products::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        return Products::create($request->all());
    }

    public function show($id)
    {
        return Products::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        return Products::destroy($id);
    }

    public function search($name)
    {
        return Products::where('name', 'like', '%'.$name.'%')->get();
    }
}
