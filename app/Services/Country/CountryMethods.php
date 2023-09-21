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
        return Country::create($data);
    }

    public function update($id, array $data)
    { 
        $country = $this->findCountryId($id);
        $country->update($data);

        return $country;
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
