<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource; 
use App\Http\Requests\CountryStoreRequest;
use App\Services\Country\CountryMethods;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    public function __construct(private CountryMethods $countryService)
    {  
    }

    public function list()
    { 
        return CountryResource::collection($this->countryService->list());         
    }

    public function show(int $id)
    { 
        return new CountryResource($this->countryService->findCountryId($id)); 
    }

    public function store(CountryStoreRequest $request)
    {                              
       return new CountryResource(
            $this->countryService->create(
                $request->validated()
            )
       );             
    } 
    
    public function update(CountryStoreRequest $request)
    { 
        return new CountryResource( 
            $this->countryService->update(
                $request->route('id'),
                $request->validated()
            )
        );      
    }   
    
    public function destroy(int $id): JsonResponse
    { 
        $country = $this->countryService->findCountryId($id);
        
        if(!$country){ 
            return new JsonResponse([
               'message' => 'Country has not been found' 
            ], 404);
        }

        $this->countryService->destroy($country);

        return new JsonResponse([
            'message' => 'Country deleted successfully' 
        ], 200);        
    }
}


