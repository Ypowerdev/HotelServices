<?php

namespace App\Services\Hotel;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;

class HotelMethods
{ 

    public function list(): Collection
    { 
        return Hotel::all();
    }
    
    public function create(array $data): Hotel 
    { 
        return Hotel::create($data);
    }

    public function update(int $id, array $data): Hotel 
    { 
        $hotel = $this->findHotelId($id);
        $hotel->update($data);

        return $hotel;
    }
  
    public function findHotelId(int $id): Hotel
    { 
        return Hotel::findOrFail($id);
    }   

    public function destroy(Hotel $hotel): bool
    { 
        return $hotel->delete();
    }
}