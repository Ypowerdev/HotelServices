<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Services;
use DB;

class DeskController extends Controller
{
    public function list()
    { 
        $data = DB::table('services')->get();
        return new JsonResponse(['data' => $data]); 
    }

     public function store(Request $request)
    { 
        $request->validate([ 
            'name' => ['required', 'min:3', 'max:15'], 
            'price' => ['required']           
        ]);
                       
        $services = new Services(); 
        $services->name = $request->name; 
        $services->price = $request->price; 
        $res = $services->save(); 

        if($res){ 
            return back()->with('success', 'New service added ');
        }else{ 
            return back()->with('fail', 'Something went wrong');
        }        
    } 
}
