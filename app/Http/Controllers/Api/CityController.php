<?php

namespace App\Http\Controllers\Api;

use App\Services\City\CityMethods;
use App\Services\Country\CountryMethods;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource; 
use App\Http\Requests\CityStoreRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function __construct(
        private CountryMethods $countryService, 
        private CityMethods $cityService
    )
    {        
    }
    
    public function list(): JsonResource
    { 
        return CityResource::collection($this->cityService->list());       
    }

    public function show(int $id): JsonResource
    { 
        return new CityResource($this->cityService->findCityId($id)); 
    }

    public function store(CityStoreRequest $request): JsonResource
    {                              
        $countryId = $request->input('country_id');
        $isCountryExists = $this->countryService->findCountryId($countryId);
                  
        return new CityResource(
            $this->cityService->create(
                $request->validated()
            )
        );                          
    } 

    public function update(CityStoreRequest $request): JsonResource
    { 
        return new CityResource( 
            $this->cityService->update(
                $request->route('id'),
                $request->validated()
            )
        );      
    }

    public function destroy()
    { 
        $this->cityService->cityDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
