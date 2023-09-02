<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest; 
use Illuminate\Http\Response;


class ServiceController extends Controller
{
    public function list()
    { 
        return ServiceResource::collection(Service::all()); 
        
    }

    public function show($id)
    { 
        return new ServiceResource(Service::findOrFail($id)); 
    }


    public function store(ServiceStoreRequest $request)
    {                              
        $created_desk = Service::create($request->validated()); 

        return new ServiceResource($created_desk);        
    } 

    public function update(ServiceStoreRequest $request, Service $desk)
    { 
        $desk->update($request->validated()); 
        return new ServiceResource($desk); 
    }

    public function destroy(Service $desk)
    { 
        $desk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
