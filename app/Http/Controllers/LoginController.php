<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only("email","password"))){
            return response()->json([
                "token" => $request->user()->createToken($request->input("name")),
                "message" => "Success"
            ]);
        }
        return response()->json([
            "message" => "Unauthenthicated"
        ]);
    }
}
