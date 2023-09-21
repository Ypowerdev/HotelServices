<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Resources\CountryResource; 
use App\Http\Requests\CountryStoreRequest;
use App\Services\Country\CountryMethods;
use App\Services\Hotel\HotelMethods;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    public function list(CountryMethods $country)
    { 
        return $country->list();         
    }

    public function show(int $id, CountryMethods $country)
    { 
        return new CountryResource($country->findCountryId($id)); 
    }

    public function store(CountryStoreRequest $request, CountryMethods $country)
    {                              
       return $country->create($request->validated());             
    } 
    
    public function update(CountryStoreRequest $request, CountryMethods $country)
    { 
        return new CountryResource( 
            $country->update(
                $request->route('id'),
                $request->validated()
            )
        );      
    }

    public function getActualHotels(HotelMethods $hotel): JsonResponse
    { 
        $response = $hotel->getActualHotels();

        return new JsonResponse($response);
    }

    public function destroy(Country $country)
    { 
        $country->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
