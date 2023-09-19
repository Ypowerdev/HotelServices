<?php 

namespace App\Services\Service;

use App\Models\Service;
use App\Models\Hotel;
use App\Http\Resources\ServiceResource; 
use App\Http\Requests\ServiceStoreRequest;
use App\Exceptions\HotelNotFoundException;
use App\Services\Hotel\HotelMethods;

class ServiceMethods
{ 
    public function store ($hotelId, HotelMethods $hotel)    { 
               
        $hotel = $hotel->findHotelId($hotelId); 
        
        return $hotel;
        
        
    }

    public function findServiceId(array $id): Service
    { 
        return Service::findOrFail($id);  
    }

    public function create($data)
    { 
        return Service::create($data); 
    }
}
