<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Positions;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        return Departments::on($client)->all();
    }

    public function store(Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        $request->validate([
            'deptName'=>'required',
            'deptPrefixID'=>'required'
        ]);
        return Departments::on($client)->create($request->all());
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

        return Departments::destroy($id);
    }

    public function search($name)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }
        
        return Departments::on($client)->where('name', 'like', '%'.$name.'%')->get();
    }
}
