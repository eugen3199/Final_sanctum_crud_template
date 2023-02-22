<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batches;
use Illuminate\Support\Facades\Storage;
use \App\Http\Controllers\ClientController;

class BatchController extends Controller
{
    public function index(Request $request)
    {

        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        return Batches::on($cd['client'])->get();
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        return Batches::on($cd['client'])->create([
            'batchName'=>$request->batchName,
            'batchClassID'=>$request->batchClassID
        ]);
    }

    public function update(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        $Batch = Batches::on($cd['client'])->find($id);
        $Batch->update($request->all());
        return $Batch;
    }

    public function destroy($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        return Batches::on($cd['client'])->delete($id);
    }

    public function search($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        $batch = Batches::on($cd['client'])->where('id','=',$id)->first();
        if ($batch === null) {
            return response('Invalid ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return $batch;
    }
}
