<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefixes;

class PrefixController extends Controller
{
    public function index()
    {
        $client_controller = new ClientController;
        $cd = $client_controller->check($request->client);
        $client= $cd['client'];
        $domain = $cd['domain'];
        
        return Prefixes::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'prefixName'=>'required'
        ]);
        return Prefixes::create($request->all());
    }

    public function show($id)
    {
        return Prefixes::find($id);
    }

    public function update(Request $request, $id)
    {
        $Prefix = Prefixes::find($id);
        $Prefix->update($request->all());
        return $Prefix;
    }

    public function destroy($id)
    {
        return Prefixes::destroy($id);
    }

    public function search($name)
    {
        return Prefixes::where('name', 'like', '%'.$name.'%')->get();
    }
}
