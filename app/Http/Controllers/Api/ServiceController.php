<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Hotel;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
            $hotelId = $request->input('hotel_id');
            $hotel = Hotel::findOrFail($hotelId);
                
            if (isset($hotel)){ 
                $createdService = Service::create($request->validated()); 
            }        
            return new ServiceResource($createdService);      
            
        }catch (ModelNotFoundException $exception){ 
            return response()->json(['message' => 'Отель c ID: ' . $hotelId . ' не найден'], 404);
        }  
               
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
