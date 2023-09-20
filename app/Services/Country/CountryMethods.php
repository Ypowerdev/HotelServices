<?php 

namespace App\Services\Country;

use App\Http\Resources\CountryResource; 
use App\Models\Country;

class CountryMethods
{ 

    public function list()
    { 
        return CountryResource::collection($this->countryAll());
    }

    public function create($data): mixed 
    { 
        return CountryResource::collection($data);
    }

    public function findCountryId(mixed $id): Country
    { 
        return Country::findOrFail($id);  
    }
   
    public function countryAll(): mixed
    { 
        return Country::all();
    }
   
    public function delete()
    { 
        return (new Country)->delete();
    }
}
