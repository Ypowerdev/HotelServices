<?php

namespace App\Services\Hotel;

use App\Models\Hotel;
use App\Http\Resources\HotelResource; 


class HotelMethods
{ 

    public function list()
    { 
        return HotelResource::collection($this->hotelAll());
    }
    
    public function create($data): mixed 
    { 
        return Hotel::create($data);
    }

    public function update($id, array $data)
    { 
        $hotel = $this->findHotelId($id);
        $hotel->update($data);

        return $hotel;
    }

    public function hotelAll(): mixed 
    { 
        return Hotel::all();
    }

    public function findHotelId(mixed $id): Hotel
    { 
        return Hotel::findOrFail($id);
    }
   
    public function hotelDelete()
    { 
        return (new Hotel)->delete();
    }    
   
}