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

    public function create(array $data): Country 
    { 
        return Country::create($data);
    }

    public function update(int $id, array $data): Country 
    { 
        $country = $this->findCountryId($id);
        $country->update($data);

        return $country;
    }
   
    public function findCountryId(int $id): Country
    { 
        return Country::findOrFail($id);  
    }        
}
