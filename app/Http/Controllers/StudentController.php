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
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        return Students::on($client)->orderBy('studCardID', 'desc')->get();
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

        $request->validate([
            'studName'=>'required',
            'studCardID'=>'required',
            'studClassID'=>'required|string|unique:'.$client.'.students,studCardID',
            'studBatchID'=>'required',
            'studGuardName'=>'required',
            'studDoB'=>'required',
            'studEmgcPhone1'=>'required',
            'studEmgcPhone2'=>'required',
            'SchoolEmgcCall'=>'required',
            'studKey'=>'required',
            'studStatus'=>'required',
        ]);

        $qrurl = 'https://'.$domain.'/public/student/'.$request->studCardID.'?studKey='.$request->studKey;
        // QrCode::size(200)->format('png')->generate($qrurl, Storage::path('/app/').$request->empCardID.'.png');
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/students/qrcodes/').$request->studCardID.'.png');

        return Students::on($client)->create($request->all());
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

        return Students::on($client)->find($id);
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

        $Student = Students::on($client)->find($id);
        $Student->update($request->all());
        return $Student;
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

        return Students::on($client)->destroy($id);
    }

    public function search($studCardID, Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql2";
        }
        else{
            $client="mysql3";
        }

        $student = Students::on($client)->where('studKey', '=', $request->studKey)->where('studCardID','=',$studCardID)->first();
        if ($student === null) {
            return response('Invalid Key or ID', 404)
            ->header('Content-Type', 'text/plain');
        }
        return Students::on($client)->where('studCardID', $studCardID)->get();
    }
}