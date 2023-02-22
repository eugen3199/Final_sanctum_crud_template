<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Positions;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Positions::on($client)->get();
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $request->validate([
            'posName'=>'required'
        ]);

        return Positions::on($client)->create($request->all());
    }

    public function show($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Positions::on($client)->find($id);
    }

    public function update(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        
        $Department = Positions::on($client)->find($id);
        $Department->update($request->all());
        return $Department;
    }

    public function destroy($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Positions::destroy($id);
    }

    public function search($name)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        
        return Positions::on($client)->where('name', 'like', '%'.$name.'%')->get();
    }
}
