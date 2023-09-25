<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Resources\HotelResource; 
use App\Http\Requests\HotelStoreRequest; 
use Illuminate\Http\Response;
use App\Services\Hotel\HotelMethods;
use App\Services\City\CityMethods;

class HotelController extends Controller
{
    public function __construct(
    private HotelMethods $hotelService, 
    private CityMethods $cityService
    )
    {
    }

    public function list()
    { 
        return $this->hotelService->list();         
    }

    public function show(int $id)
    { 
        return new HotelResource($this->hotelService->findHotelId($id)); 
    }

    public function store(HotelStoreRequest $request)
    {                              
        $cityId = $request->input('city_id');
        $isCityExists = $this->cityService->findCityId($cityId);
                  
        return $this->hotelService->create($request->validated());                          
    } 
    
    public function update(HotelStoreRequest $request)
    { 
        return new HotelResource( 
            $this->hotelService->update(
                $request->route('id'),
                $request->validated()
            )
        );      
    }

    public function destroy()
    { 
        $this->hotelService->hotelDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
