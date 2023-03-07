<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Prefixes;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        return Departments::on($client)->get();
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $request->validate([
            'deptName'=>'required',
            'prefixName'=>'required'
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

        return Departments::on($client)->create([
            'deptName'=>$request->deptName,
            'deptPrefixID'=>$prefix_id
        ]);
    }

    public function show($id, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        return Departments::on($client)->find($id);
    }

    public function update(Request $request, $id)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }
        
        $Department = Departments::on($client)->find($id);
        $Department->update($request->all());
        return $Department;
    }

    public function destroy($id, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        $department = Departments::on($client)->find($id);
        if ($department != null){
            $department->delete();
            return response('Department with ID:'.$id.' successfully deleted', 200)
                ->header('Content-Type', 'text/plain');
        }
        else{
            return response('Department with ID:'.$id.' does not exist', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function search($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);

        $department = Departments::on($cd['client'])->where('id','=',$id)->first();
        if ($department === null) {
            return response('Invalid ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return $department;
    }
}
