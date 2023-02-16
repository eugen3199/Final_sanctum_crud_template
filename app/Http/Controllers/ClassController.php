<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Prefixes;

class ClassController extends Controller
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

        return Classes::on($client)->get();
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
        $Batch = Classes::find($id);
        $Batch->update($request->all());
        return $Batch;
    }

    public function destroy($id)
    {
        return Classes::destroy($id);
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

        $class = Classes::on($client)->where('id','=',$id)->first();
        if ($class === null) {
            return response('Invalid ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return $class;
    }
}
