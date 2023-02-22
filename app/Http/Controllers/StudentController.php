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
                ->get();
        }
        else{
            return Students::on($client)
                ->orderBy('studCardID', 'desc')
                ->where('studClassID', '=', $request->filterClassID)
                ->get();
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
        $domain = $cd['domain'];

        return Students::on($client)->delete($id);
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
}