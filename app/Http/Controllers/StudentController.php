<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
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

        return Students::on($client)->orderBy('studCardID', 'desc')->get();
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
            'studName'=>'required',
            'studCardID'=>'required',
            'studClassID'=>'required|string|unique:'.$client.'.students,studCardID',
            'studBatchID'=>'required',
            'studGuardName'=>'required',
            'studDoB'=>'required',
            'studEmgcPhone1'=>'required',
            'studEmgcPhone2'=>'required',
            'SchoolEmgcCall'=>'required',
            'studKey'=>'required',
            'studStatus'=>'required',
        ]);
        return Students::on($client)->create($request->all());
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

        return Students::on($client)->find($id);
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

        $Student = Students::on($client)->find($id);
        $Student->update($request->all());
        return $Student;
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

        return Students::on($client)->destroy($id);
    }

    public function search($name, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        return Students::on($client)->where('name', 'like', '%'.$name.'%')->get();
    }
}