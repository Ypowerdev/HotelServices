<?php 

namespace App\Services\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\CityStoreRequest;

class CityMethods
{ 

    public function list(): Collection
    { 
        return City::all();
    }

    public function create(array $data): City
    { 
        return City::create($data); 
    }

    public function update(int $id, array $data): City 
    { 
        $city = $this->findCityId($id);
        $city->update($data);

        return $city;
    }
     
    public function findCityId(int $id): City
    { 
        return City::findOrFail($id);  
    }
         
}
