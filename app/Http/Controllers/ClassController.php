<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Prefixes;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Classes::on($client)->get();
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain= $cd['domain'];

        $request->validate([
            'className'=>'required',
            'client'=>'required',
            'prefixName'=>'required',
        ]);

        $prefix_exists = Prefixes::on($client)->where('prefixName','=',$request->prefixName)->first();
        
        $prefix_id = 0;

        if($prefix_exists == null){
            $prefix =  Prefixes::on($client)->create([
                'prefixName'=>$request->prefixName
            ]);
            $prefix_id = $prefix->id;
        }
        else{
            $prefix_id = $prefix_exists->id;
        }

        return Classes::on($client)->create([
            'className'=>$request->className,
            'classPrefixID'=>$prefix_id
        ]);
    }

    public function update(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $Class = Classes::on($client)->find($id);
        $Class->update($request->all());
        return $Class;
    }

    public function destroy(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $class = Classes::on($client)->find($id);
        if ($class != null){
            $class->delete();
            return response('Class with ID:'.$id.' successfully deleted', 200)
                ->header('Content-Type', 'text/plain');
        }
        else{
            return response('Class with ID:'.$id.' does not exist', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function search($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $class = Classes::on($client)->where('id','=',$id)->first();
        if ($class === null) {
            return response('Invalid ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return $class;
    }
}
