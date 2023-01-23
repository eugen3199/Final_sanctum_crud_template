<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentController extends Controller
{
    public function index()
    {
        return Departments::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'deptName'=>'required'
        ]);
        return Departments::create($request->all());
    }

    public function show($id)
    {
        return Departments::find($id);
    }

    public function update(Request $request, $id)
    {
        $Department = Departments::find($id);
        $Department->update($request->all());
        return $Department;
    }

    public function destroy($id)
    {
        return Departments::destroy($id);
    }

    public function search($name)
    {
        return Departments::where('name', 'like', '%'.$name.'%')->get();
    }
}
