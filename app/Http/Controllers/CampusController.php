<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campuses;

class CampusController extends Controller
{
    public function index()
    {
        return Campuses::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'campusName'=>'required'
        ]);
        return Campuses::create($request->all());
    }

    public function show($id)
    {
        return Campuses::find($id);
    }

    public function update(Request $request, $id)
    {
        $Campus = Campuses::find($id);
        $Campus->update($request->all());
        return $Campus;
    }

    public function destroy($id)
    {
        return Campuses::destroy($id);
    }

    public function search($name)
    {
        return Campuses::where('name', 'like', '%'.$name.'%')->get();
    }
}
