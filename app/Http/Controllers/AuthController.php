<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'client' => 'required'
        ]);

        $client='';

        if($fields['client']=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        $user = Users::on($client)->create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('kbtc_oid')->plainTextToken;

        $ip = $request->ip();
        
        $response = [
            'user' => $user,
            'token' => $token,
            'ip' => $ip,
            'client' => $fields['client']
        ];

        // $user->assignRole('');

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $client='';

        if($fields['client']=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        $user = Users::connection($client)->where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad Creds'
            ]);
        }

        $token = $user->createToken('kbtc_oid')->plainTextToken;

        $ip = $request->ip();

        $response = [
            'user' => $user,
            'token' => $token,
            'ip' => $ip
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $client='';

        if($request->client=='kbtc'){
            $client="mysql";
        }
        else{
            $client="mysql2";
        }

        connection($client)->auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ]);
    }
}
