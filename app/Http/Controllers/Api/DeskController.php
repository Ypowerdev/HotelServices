<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Service;
use DB;
use App\Http\Resources\DeskResource; 
use App\Http\Requests\DeskStoreRequest; 
use Illuminate\Http\Response;


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


    public function store(DeskStoreRequest $request)
    {                              
        $created_desk = Service::create($request->validated()); 

        return new DeskResource($created_desk);        
    } 

    public function update(DeskStoreRequest $request, Service $desk)
    { 
        $desk->update($request->validated()); 
        return new DeskResource($desk); 
    }

    public function destroy(Service $desk)
    { 
        $desk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
