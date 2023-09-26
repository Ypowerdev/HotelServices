<?php

namespace App\Services\Hotel;

use App\Models\Hotel;
use App\Http\Resources\HotelResource;
use Illuminate\Database\Eloquent\Collection;

class HotelMethods
{ 

    public function list(): Collection
    { 
        return Hotel::all();
    }
    
    public function create($data): Hotel 
    { 
        return Hotel::create($data);
    }

    public function update($id, array $data): Hotel 
    { 
        $hotel = $this->findHotelId($id);
        $hotel->update($data);

        return $hotel;
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