<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campuses;

class CampusController extends Controller
{
    public function index(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        
        return Campuses::on($cd['client'])->get();
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Campuses::on($client)->create($request->all());
    }

    public function show($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Campuses::on($client)->find($id);
    }

    public function update(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $Campus = Campuses::on($client)->find($id);
        $Campus->update($request->all());
        return $Campus;
    }

    public function destroy($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Campuses::on($client)->destroy($id);
    }

    public function search($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        $campus = Campuses::on($cd['client'])->where('id','=',$id)->first();
        if ($campus === null) {
            return response('Invalid ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return $campus;
    }
}
