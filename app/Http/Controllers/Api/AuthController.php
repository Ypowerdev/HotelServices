<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function login()
    { 
         
    }


    public function user()
    { 

    }
}
