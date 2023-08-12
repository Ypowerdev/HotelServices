<?php

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;

class AuthController extends Controller
{ 
    public function register(Request $request)
    { 
        return User::create([ 
            'email' => $request->input('email'),  
            'name' => $request->input('name'), 
            'password' => Hash::make($request->input('password'))    
        ]);
    }

    public function login(Request $request)
    { 
        if (!Auth::attempt($request->only('email', 'password'))){ 
            return response ([
                'message' => 'Invalid credentials', 
            ], Response::HTTP_UNAUTHORIZED);            
        }

        $user = Auth::user(); 

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24); 

        return response([
           'message' => 'Success' 
        ])->withCookie($cookie);
    }
}