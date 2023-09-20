<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\HotelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Hotel;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest;
use App\Services\Service\ServiceMethods;
use App\Services\Hotel\HotelMethods;
use App\Services\Service\ServiceStoreService;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    public function list(ServiceMethods $service)
    { 
        return $service->list();         
    }

    public function show(int $id, ServiceMethods $service)
    { 
        return new ServiceResource($service->findServiceId($id)); 
    }

    public function store(ServiceStoreRequest $request, ServiceMethods $service, HotelMethods $hotel)
    {                              
        $hotelId = $request->input('hotel_id');
        $isHotelExists = $service->store($hotelId, $hotel);
                  
        return $service->create($request->validated());
                          
    } 

    public function update(ServiceStoreRequest $request, ServiceMethods $service)
    { 
        $serviceId = $service->findServiceId($request->route('id'));        
        $serviceId->update($request->validated()); 
        
        return new ServiceResource($serviceId); 
    }

    public function destroy(ServiceMethods $service)
    { 
        $service->serviceDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
