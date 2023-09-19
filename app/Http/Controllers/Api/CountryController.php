<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Resources\CountryResource; 
use App\Http\Requests\CountryStoreRequest;
use App\Services\Hotel\HotelMethods;
use Illuminate\Http\JsonResponse;
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
        $createdCountry = Country::create($request->validated()); 

        return new CountryResource($createdCountry);        
    } 

    public function update(CountryStoreRequest $request, Country $country)
    { 
        $countryId = $country->findOrFail($request->route('id')); 
        $countryId->update($request->validated());  

        return new CountryResource($countryId); 
    }

    public function destroy(Country $country)
    { 
        $country->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getHotels(HotelMethods $hotelService): JsonResponse 
    { 
        $response = $hotelService->getActualHotels();

        return new JsonResponse($response);
    }
}
