<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    public function index()
    {
        return Classes::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'className'=>'required',
            'classPrefixID'=>'required'
        ]);
        return Classes::create($request->all());
    }

    public function show($id)
    {
        return Classes::find($id);
    }

    public function update(Request $request, $id)
    {
        $Batch = Classes::find($id);
        $Batch->update($request->all());
        return $Batch;
    }

    public function destroy($id)
    {
        return Classes::destroy($id);
    }

    public function search($name)
    {
        return Classes::where('name', 'like', '%'.$name.'%')->get();
    }
}
