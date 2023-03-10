<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        if($request->filterClassID=='*'){
            return Students::on($client)
                ->orderBy('studCardID', 'desc')
                ->paginate(15);
        }
        else{
            return Students::on($client)
                ->orderBy('studCardID', 'desc')
                ->where('studClassID', '=', $request->filterClassID)
                ->paginate(15);
        }
    }

    public function store(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        $request->validate([
            'studName'=>'required',
            'studCardID'=>'required|string|unique:'.$client.'.students,studCardID',
            'studClassID'=>'required',
            'studBatchID'=>'required',
            'studGuardName'=>'required',
            'studDoB'=>'required',
            'studEmgcPhone1'=>'required',
            'studEmgcPhone2'=>'required',
            'SchoolEmgcCall'=>'required',
            'studKey'=>'required',
            'studStatus'=>'required',
            'studQR'=>'required',
            'studProfileImg'=>'nullable',
        ]);

        $qrurl = 'https://'.$domain.'/public/student/'.$request->studCardID.'?studKey='.$request->studKey;
        // QrCode::size(200)->format('png')->generate($qrurl, Storage::path('/app/').$request->empCardID.'.png');
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/students/qrcodes/').$request->studQR);

        return Students::on($client)->create($request->all());
    }

    public function show($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        return Students::on($client)->find($id);
    }

    public function update(Request $request, $id)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        $Student = Students::on($client)->find($id);
        $Student->update($request->all());
        return $Student;
    }

    public function destroy($id, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];

        $student = Students::on($client)->find($id);
        if ($student != null){
            $student->delete();
            return response('Student with ID:'.$id.' successfully deleted', 200)
                ->header('Content-Type', 'text/plain');
        }
        else{
            return response('Student with ID:'.$id.' does not exist', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function search($studCardID, Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        $student = Students::on($client)->where('studKey', '=', $request->studKey)->where('studCardID','=',$studCardID)->first();
        if ($student === null) {
            return response('Invalid Key or ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return Students::on($client)->where('studCardID', $studCardID)->get();
    }

    public function query(Request $request)
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];

        $search_value = $request->search_value; // searchstring

        $studName = Students::on($cd['client'])
        ->where('studName', 'LIKE', '%'.$search_value.'%');

        $studGuardName = Students::on($cd['client'])
            ->where('studGuardName', 'LIKE', '%'.$search_value.'%');

        $studEmgcPhone2 = Students::on($cd['client'])
            ->where('studEmgcPhone2', 'LIKE', '%'.$search_value.'%');

        $studEmgcPhone1 = Students::on($cd['client'])
            ->where('studEmgcPhone1', 'LIKE', '%'.$search_value.'%');

        $search = Students::on($cd['client'])
            ->where('studCardID', 'LIKE', '%'.$search_value.'%')
            ->union($studName)
            ->union($studGuardName)
            ->union($studEmgcPhone1)
            ->union($studEmgcPhone2)
            ->paginate(20);

        return $search;
    }
}