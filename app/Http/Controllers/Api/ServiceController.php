<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest;
use App\Services\Service\ServiceMethods;
use App\Services\Hotel\HotelMethods;
use Illuminate\Http\Response;

class ServiceController extends Controller
{

    public function __construct(
        private ServiceMethods $service, 
        private HotelMethods $hotelService
    )
    {        
    }

    public function list()
    { 
        return ServiceResource::collection($this->service->list());         
    }

    public function show(int $id)
    { 
        return new ServiceResource($this->service->findServiceId($id)); 
    }

    public function store(ServiceStoreRequest $request)
    {                              
        $hotelId = $request->input('hotel_id');
        $isHotelExists = $this->hotelService->findHotelId($hotelId);
                  
        return $this->service->create($request->validated());
                          
    } 

    public function update(ServiceStoreRequest $request)
    { 
        return new ServiceResource( 
            $this->service->update(
                $request->route('id'),
                $request->validated()
            )
        );      
    }

    public function destroy()
    { 
        $this->service->serviceDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
