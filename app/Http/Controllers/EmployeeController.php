<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employees::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'empName'=>'required',
            'empCardID'=>'required'
            // 'empPosID'=>'',
            // 'empDeptID'=>'',
            // 'empJoinDate'=>'',
            // 'empNRC'=>'',
            // 'empPhone'=>'',
            // 'empEmgcPerson'=>'',
            // 'empEmgcPhone'=>'',
            // 'empCampusID'=>''
        ]);
        return Employees::create($request->all());
    }

    public function show($id)
    {
        $employee = Employees::find($id);
        if ($employee == Null){
            return response('Employee with ID:'.$id.' not found.', 404)
                ->header('Content-Type', 'text/plain');
        }
        return $employee;
        
    }

    public function update(Request $request, $id)
    {
        $Employee = Employees::find($id);
        $Employee->update($request->all());
        return $Employee;
    }

    public function destroy($id)
    {
        return Employees::destroy($id);
    }

    public function search($name)
    {
        return Employees::where('name', 'like', '%'.$name.'%')->get();
    }
}
