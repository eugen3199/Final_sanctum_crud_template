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

        $campus = Campuses::on($client)->find($id);
        if ($campus != null){
            $campus->delete();
            return response('Campus with ID:'.$id.' successfully deleted', 200)
                ->header('Content-Type', 'text/plain');
        }
        else{
            return response('Campus with ID:'.$id.' does not exist', 404)
                ->header('Content-Type', 'text/plain');
        }

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
