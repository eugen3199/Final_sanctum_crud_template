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
        //TODO - Validate Data Types and format
        $request->validate([
            'empName'=>'required',
            'empCardID'=>'required',
            'empPosID'=>'required',
            'empDeptID'=>'required',
            'empJoinDate'=>'required',
            'empNRC'=>'required',
            'empPhone'=>'required',
            'empEmgcPerson'=>'required',
            'empEmgcPhone'=>'required',
            'empCampusID'=>'required'
        ]);

        $response = Employees::create($request->all());
        $qrurl = 'https://id.kbtc.edu.mm/public/employees/'.$request->empCardID;
        $qrcode = QrCode::size(300)->generate($qrurl);

        return $response;
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
        $employee = Employees::destroy($id);
        if ($employee == 1){
            return response('Employee with ID:'.$id.' successfully deleted', 200)
                ->header('Content-Type', 'text/plain');
        }
        else{
            return response('Employee with ID:'.$id.' was not deleted', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function search($name)
    {
        return Employees::where('name', 'like', '%'.$name.'%')->get();
    }
}
