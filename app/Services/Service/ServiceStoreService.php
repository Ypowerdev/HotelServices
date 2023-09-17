<?php 

namespace App\Services\Service;

use App\Models\Service;
use App\Models\Hotel;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest;
use App\Exceptions\HotelNotFoundException;


class ServiceStoreService
{ 
    public function store (ServiceStoreRequest $request)
    { 
               
        // $hotelId = $request->input('hotel_id'); - никаких реквестов
        // $hotel = Hotel::findOrFail($hotelId); - вынести в отдельный сервис  
            
        return Service::create($request->validated());     
        
    }

    public function findOrFail($id)
    { 
        return Service::findOrFail($id);  
    }
}
