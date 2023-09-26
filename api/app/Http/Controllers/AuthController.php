<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($validation)) {
            $response = [
                'token' =>  $request->user()->createToken('meu_token',['todos','tests','success']),
                'success' => true
            ];
            return response($response, 200);
        }
        return response(['success' => false],401);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response('Revogate token', 200);
    }
    public function me(Request $request)
    {
        return response($request->user(), 200);
    }
}
