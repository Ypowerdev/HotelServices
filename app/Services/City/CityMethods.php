<?php 

namespace App\Services\City;

use App\Models\City;

class CityMethods
{ 

    public function list()
    { 
        return $this->cityAll();
    }

    public function create($data): City
    { 
        return City::create($data); 
    }

    public function update($id, array $data)
    { 
        $city = $this->findCityId($id);
        $city->update($data);

        return $city;
    }

    public function cityAll(): mixed 
    { 
        return City::all();
    }  
   
    public function findCityId(mixed $id): City
    { 
        return City::findOrFail($id);  
    }
      
    public function cityDelete()
    { 
        return (new City)->delete();
    }
}
