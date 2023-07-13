<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Service;
use DB;
use App\Http\Resources\DeskResource; 


class DeskController extends Controller
{
    public function list()
    { 
        return DeskResource::collection(Service::all()); 
        
    }

    public function show($id)
    { 
        return new DeskResource(Service::findOrFail($id)); 
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
        return new JsonResponse([]); 

        // if($res){ 
        //     return back()->with('success', 'New service added ');
        // }else{ 
        //     return back()->with('fail', 'Something went wrong');
        // }        
    } 

    public function update(Request $request, $id)
    { 

    }
}
