<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batches;

class BatchController extends Controller
{
    public function index()
    {
        return Batches::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'batchName'=>'required',
            'batchClassID'=>'required'
        ]);
        return Batches::on($client)->create($request->all());
    }

    public function show($id)
    {
        return Batches::find($id);
    }

    public function update(Request $request, $id)
    {
        $Batch = Batches::on($client)->find($id);
        $Batch->update($request->all());
        return $Batch;
    }

    public function destroy($id)
    {
        return Batches::on($client)->destroy($id);
    }

    public function search($name)
    {
        return Batches::on($client)->where('name', 'like', '%'.$name.'%')->get();
    }
}
