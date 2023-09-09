<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Resources\CountryResource; 
use App\Http\Requests\CountryStoreRequest; 
use Illuminate\Http\Response;

class CountryController extends Controller
{
    public function list()
    { 
        return CountryResource::collection(Country::all());         
    }

    public function show(int $id)
    { 
        return new CountryResource(Country::findOrFail($id)); 
    }

    public function store(CountryStoreRequest $request)
    {                              
        $createdService = Country::create($request->validated()); 

        return new CountryResource($createdService);        
    } 

    public function update(CountryStoreRequest $request, Country $service)
    { 
        $service->update($request->validated()); 
        
        return new CountryResource($service); 
    }

    public function destroy(Country $service)
    { 
        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
