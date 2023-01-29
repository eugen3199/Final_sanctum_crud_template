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
            'password' => 'required|string|confirmed'
        ]);

        $user = Users::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('kbtc_oid')->plainTextToken;

        $ip = $request->ip();
        
        $response = [
            'user' => $user,
            'token' => $token,
            'ip' => $ip
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

        $user = Users::where('email', $fields['email'])->first();

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
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ]);
    }
}
