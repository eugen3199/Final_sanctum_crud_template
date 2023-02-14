<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campuses;

class CampusController extends Controller
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

        return Campuses::on($client)->get();
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
            'campusName'=>'required'
        ]);

        return Campuses::on($client)->create($request->all());
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

        return Campuses::on($client)->find($id);
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

        $Campus = Campuses::on($client)->find($id);
        $Campus->update($request->all());
        return $Campus;
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

        return Campuses::on($client)->destroy($id);
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

        return Campuses::on($client)->where('name', 'like', '%'.$name.'%')->get();
    }
}
