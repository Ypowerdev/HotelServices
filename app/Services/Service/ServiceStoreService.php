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
               
        $hotelId = $request->input('hotel_id');
        $hotel = Hotel::findOrFail($hotelId);
            
        if (!is_null($hotel)){ 
            $createdService = Service::create($request->validated()); 
        }else{ 
            throw new HotelNotFoundException('Hotel with ' .$hotelId. ' is not in the list');
        }   
        
        return $createdService; 
    }
}
