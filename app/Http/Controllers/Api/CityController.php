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

    public function show($id)
    { 
        return new CityResource(City::findOrFail($id)); 
    }

    public function store(CityStoreRequest $request)
    {                              
        $createdService = City::create($request->validated()); 

        return new CityResource($createdService);        
    } 

    public function update(CityStoreRequest $request, City $service)
    { 
        $service->update($request->validated()); 
        
        return new CityResource($service); 
    }

    public function destroy(City $service)
    { 
        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
