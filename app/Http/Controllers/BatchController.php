<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batches;

class BatchController extends Controller
{
    public function index(Request $request)
    {

        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        elseif ($request->client=='isr') {
            $client="mysql3";
        }
        elseif ($request->client=='test') {
            $client="mysql4";
        }
        else{
            return '404 not found';
        }

        return Batches::on($client)->get();
    }

    public function store(Request $request)
    {
        $client='';
        $domain='';

        if($request->client=='kbtc'){
            $client="mysql2";
            $domain="id.kbtc.edu.mm";
        }
        else{
            $client="mysql3";
            $domain="id.isr.edu.mm";
        }

        $request->validate([
            'batchName'=>'required',
            'batchClassID'=>'required',
            'client'=>'required',
        ]);

        return Batches::on($client)->create([
            'batchName'=>$request->batchName,
            'batchClassID'=>$request->batchClassID
        ]);
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

    public function search($id, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        $batch = Batches::on($client)->where('id','=',$id)->first();
        if ($batch === null) {
            return response('Invalid ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return $batch;
    }
}
