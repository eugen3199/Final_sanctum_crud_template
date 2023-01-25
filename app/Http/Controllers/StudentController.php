<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    public function index()
    {
        return Students::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'studName'=>'required',
            'studCardID'=>'required'
        ]);
        return Students::create($request->all());
    }

    public function show($id)
    {
        return Students::find($id);
    }

    public function update(Request $request, $id)
    {
        $Student = Students::find($id);
        $Student->update($request->all());
        return $Student;
    }

    public function destroy($id)
    {
        return Students::destroy($id);
    }

    public function search($name)
    {
        return Students::where('name', 'like', '%'.$name.'%')->get();
    }
}
