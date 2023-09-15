<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Resources\CityResource; 
use App\Http\Requests\CityStoreRequest; 
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function list()
    { 
        return CityResource::collection(City::all());         
    }

    public function show(int $id)
    { 
        return new CityResource(City::findOrFail($id)); 
    }

    public function store(CityStoreRequest $request)
    {                              
        $createdCity = City::create($request->validated()); 
        
        return new CityResource($createdCity);        
    } 

    public function update(CityStoreRequest $request, City $city)
    { 
        $cityId = $city->findOrFail($request->route('id')); 

        $cityId->update($request->validated());  

        return new CityResource($cityId); 
    }

    public function destroy(City $city)
    { 
        $city->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
