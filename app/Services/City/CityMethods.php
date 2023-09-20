<?php 

namespace App\Services\City;

use App\Http\Resources\CityResource; 
use App\Models\City;
use App\Models\Country;
use App\Services\Country\CountryMethods;

class CityMethods
{ 

    public function list()
    { 
        return CityResource::collection($this->cityAll());
    }

    public function findCountry(mixed $countryId, CountryMethods $country): Country
    {                
        $country = $country->findCountryId($countryId);             
        return $country;          
    }

    public function create($data): City
    { 
        return City::create($data); 
    }

    public function findCityId(mixed $id): City
    { 
        return City::findOrFail($id);  
    }
   
    public function cityAll(): mixed 
    { 
        return City::all();
    }
   
    public function cityDelete ()
    { 
        return (new City)->delete();
    }
}
