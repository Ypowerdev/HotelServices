<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller
{
    public function register(Request $request)
    { 
        return User::create([
            'name' => $request->input('name'),  
            'email' => $request->input('email'), 
            'password' => Hash::make ($request->input('password'))
        ]);         
    }

    public function login(Request $request)
    { 
       if(!Auth::attempt($request->only('email', 'password'))){ 
           return response([
                'message' => 'Invalid credentials'
           ], Response::HTTP_UNAUTHORIZED);  
       }     
       
        $user = Auth::user(); 

        $token = $user->createToken('token')->plainTextToken; 

        $cookie = cookie('jwt', $token, 60 * 24);

        return response([ 
            'message' => 'Success'
        ])->withCookie($cookie);
    }

    public function user()
    { 
        return Auth::user(); 
    }

    public function logout()
    { 
        $cookie = Cookie::forget('jwt');

        return response ([
            'message' => 'Success'
        ])->withCookie($cookie); 
    }

    public function helloUser()
    { 
        $user = Auth::user(); 
        $email = $user->email; 
        echo  'Hello, {{ $email }}'; 
    }

}
