<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
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

        return Employees::on($client)->orderBy('empCardID', 'desc')->get();
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

        //TODO - Validate Data Types and format
        $request->validate([
            'empName'=>'required',
            'empCardID'=>'required|string|unique:'.$client.'.employees,empCardID',
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
            'empQR'=>'required',
            'studProfileImg'=>'nullable',
            'client'=>'required',
        ]);

        $response = Employees::on($client)->create($request->all());
        // $qrurl = 'https://'.$domain.'/public/employee/'.$request->empCardID.'?empKey='.$request->empKey;
        $qrurl = 'https://kbtccollege-my.sharepoint.com/:b:/g/personal/digital_marketing_kbtc_edu_mm/EdQqfVB3bLZOhGlgI3aRAykB65uzLr73AQTpcU80yvAbMA?e=4LOAS4';
        // QrCode::size(200)->format('png')->generate($qrurl, Storage::path('/app/').$request->empCardID.'.png');
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/').$request->empQR);

        return $response;
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

        $employee = Employees::on($client)->find($id);
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
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        $Employee = Employees::on($client)->find($id);
        $Employee->update($request->all());
        return $Employee;
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

        $employee = Employees::on($client)->destroy($id);
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
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        $employee = Employees::on($client)->where('empKey', '=', $request->empKey)->where('empCardID','=',$empCardID)->first();
        if ($employee === null) {
            return response('Invalid Key or ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return Employees::on($client)->where('empCardID', $empCardID)->get();
    }
}
