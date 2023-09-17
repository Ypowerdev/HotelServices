<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\HotelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Hotel;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest;
use App\Services\Service\ServiceStoreService;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    public function list()
    { 
        return ServiceResource::collection(Service::all());         
    }

    public function show(int $id)
    { 
        return new ServiceResource(Service::findOrFail($id)); 
    }

    public function store(ServiceStoreRequest $request)
    {                              
              
       try{ 
            $serviceCreate = (new ServiceStoreService())->store($request); 
       }catch (HotelNotFoundException $exception) { 
            return response()->json([
                'error' => $exception->getMessage()
           ], 400);  
       }   
       
       return $serviceCreate;
                          
    } 

    public function update(ServiceStoreRequest $request, Service $service)
    { 
        $service->update($request->validated()); 
        
        return new ServiceResource($service); 
    }

    public function destroy(Service $service)
    { 
        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
