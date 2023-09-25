<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource; 
use App\Http\Requests\CountryStoreRequest;
use App\Services\Country\CountryMethods;
use Illuminate\Http\Response;

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
       return $this->countryService->create($request->validated());             
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
   
    public function destroy()
    { 
        $this->countryService->countryDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
