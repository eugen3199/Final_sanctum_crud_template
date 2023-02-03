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
            'empKey'=>'required',
            'empStatus'=>'required',
            'client'=>'required',
        ]);

        $client='';
        $domain='';

        if($request->client=='kbtc'){
            $client="mysql";
            $domain="id.kbtc.edu.mm";
        }
        else{
            $client="mysql2";
            $domain="id.isr.edu.mm";
        }

        $response = Employees::connection($client)->create($request->all());
        $qrurl = 'https://'.$domain.'/public/employee/'.$request->empCardID.'?empKey='.$request->empKey;
        // QrCode::size(200)->format('png')->generate($qrurl, Storage::path('/app/').$request->empCardID.'.png');
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/qrcodes/').$request->empCardID.'.png');

        return $response;
    }

    public function show($id, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        $employee = Employees::connection($client)->find($id);
        if ($employee == Null){
            return response('Employee with ID:'.$id.' not found.', 404)
                ->header('Content-Type', 'text/plain');
        }
        return $employee;
        
    }

    public function update(Request $request, $id)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        $Employee = Employees::connection($client)->find($id);
        $Employee->update($request->all());
        return $Employee;
    }

    public function destroy($id, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        $employee = Employees::connection($client)->destroy($id);
        if ($employee == 1){
            return response('Employee with ID:'.$id.' successfully deleted', 200)
                ->header('Content-Type', 'text/plain');
        }
        else{
            return response('Employee with ID:'.$id.' does not exist', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function search($empCardID, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        $employee = Employees::connection($client)->where([
            ['empKey', '=', $request->empKey],
            ['empCardID', '=', $empCardID]
        ])->first();
        if ($employee === null) {
            return response('Invalid Key or ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return Employees::connection($client)->where('empCardID', $empCardID)->get();
    }
}
