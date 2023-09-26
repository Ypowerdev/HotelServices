<?php 

namespace App\Services\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityMethods
{ 

    public function list(): Collection
    { 
        return City::all();
    }

    public function create($data): City
    { 
        return City::create($data); 
    }

    public function update($id, array $data): City 
    { 
        $city = $this->findCityId($id);
        $city->update($data);

        return $city;
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
