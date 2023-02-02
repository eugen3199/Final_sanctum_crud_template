<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

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
            'empCampusID'=>'required',
            'empImage'=>'required'
        ]);

        $response = Employees::create($request->all(), ['except' => ['empImage'] ]);

        //Qr code generate
        $qrurl = 'https://id.kbtc.edu.mm/public/employee/'.$request->empCardID;
        // QrCode::size(200)->format('png')->generate($qrurl, Storage::path('/app/').$request->empCardID.'.png');
        QrCode::size(200)->format('png')->generate($qrurl, '../public/qrcodes/'.$request->empCardID.'.png');

        //Store Image
        $imageName = $request->empCardID.$request->empImage->extension();

        // Public Folder
        $request->image->move(public_path('empImage'), $imageName);

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

    public function search($empCardID)
    {
        return Employees::where('empCardID', $empCardID)->get();
    }
}
