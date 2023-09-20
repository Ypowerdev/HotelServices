<?php

namespace App\Http\Controllers\Api;

use App\Services\City\CityMethods;
use App\Services\Country\CountryMethods;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Resources\CityResource; 
use App\Http\Requests\CityStoreRequest; 
use Illuminate\Http\Response;

class CityController extends Controller
{
    
    public function list(CityMethods $city)
    { 
        return $city->list();       
    }

    public function show(int $id, CityMethods $city)
    { 
        return new CityResource($city->findCityId($id)); 
    }

    public function store(CityStoreRequest $request, CityMethods $city, CountryMethods $country)
    {                              
        $countryId = $request->input('country_id');
        $isCountryExists = $city->findCountry($countryId, $country);
                  
        return $city->create($request->validated());                          
    } 

    public function update(CityStoreRequest $request, CityMethods $city)
    { 
        $cityId = $city->findCityId($request->route('id')); 
        $cityId->update($request->validated());  

        return new CityResource($cityId); 
    }

    public function destroy(City $city)
    { 
        $city->cityDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
