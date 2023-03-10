<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportEmployee;
use App\Imports\ImportEmployee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $employees = Employees::on($client)->orderBy('empCardID', 'desc')->paginate(10);

        return $employees;
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

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
            'empProfileImg'=>'required',
            'client'=>'required',
        ]);

        $response = Employees::on($client)->create($request->all());
        $qrurl = 'https://'.$domain.'/public/employee/'.$request->empCardID.'?empKey='.$request->empKey;
        // QrCode::size(200)->format('png')->generate($qrurl, Storage::path('/app/').$request->empCardID.'.png');
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/employees/qrcodes/').$request->empQR);

        return $response;
    }

    public function show($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $employee = Employees::on($client)->find($id);
        if ($employee == Null){
            return response('Employee with ID:'.$id.' not found.', 404)
                ->header('Content-Type', 'text/plain');
        }
        return $employee;
        
    }

    public function update(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $Employee = Employees::on($client)->find($id);
        $Employee->update($request->all());
        return $Employee;
    }

    public function destroy($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $employee = Employees::on($client)->find($id);
        if ($employee != null){
            $employee->delete();
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
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $employee = Employees::on($client)->where('empKey', '=', $request->empKey)->where('empCardID','=',$empCardID)->first();
        if ($employee === null) {
            return response('Invalid Key or ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return Employees::on($client)->where('empCardID', $empCardID)->get();
    }

    public function query(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        $search_value = $request->search_value; // searchstring

        $empName = Employees::on($cd['client'])
        ->where('empName', 'LIKE', '%'.$search_value.'%');

        $empNRC = Employees::on($cd['client'])
            ->where('empNRC', 'LIKE', '%'.$search_value.'%');

        $empEmgcPerson = Employees::on($cd['client'])
            ->where('empEmgcPerson', 'LIKE', '%'.$search_value.'%');

        $empEmgcPhone = Employees::on($cd['client'])
            ->where('empEmgcPhone', 'LIKE', '%'.$search_value.'%');

        $empJoinDate = Employees::on($cd['client'])
            ->where('empJoinDate', 'LIKE', '%'.$search_value.'%');

        $search = Employees::on($cd['client'])
            ->where('empCardID', 'LIKE', '%'.$search_value.'%')
            ->union($empName)
            ->union($empNRC)
            ->union($empEmgcPerson)
            ->union($empEmgcPhone)
            ->union($empJoinDate)
            ->paginate(20);

        return $search;
    }

    public function preview(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];
    }

    public function import(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        Excel::import(new ImportEmployee($cd['client'], $cd['domain']), $request->file);

        return back()->withStatus('File imported successfully');
    }

    public function export(Request $request, \Maatwebsite\Excel\Excel $file)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        return $file->download(new ExportEmployee($cd['client']), 'Employees.xlsx');
    }
}
