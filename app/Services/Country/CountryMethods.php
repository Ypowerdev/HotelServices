<?php 

namespace App\Services\Country;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryMethods
{ 

    public function list(): Collection
    { 
        return Country::all();
    }

    public function create($data): Country 
    { 
        return Country::create($data);
    }

    public function update($id, array $data): Country 
    { 
        $country = $this->findCountryId($id);
        $country->update($data);

        return $country;
    }
   
    public function findCountryId(mixed $id): Country
    { 
        return Country::findOrFail($id);  
    }
     
    public function countryDelete()
    { 
        return (new Country)->delete();
    }
}
