<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource; 
use App\Http\Requests\HotelStoreRequest; 
use App\Services\Hotel\HotelMethods;
use App\Services\City\CityMethods;
use Illuminate\Http\JsonResponse;

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
        return HotelResource::collection($this->hotelService->list());         
    }

    public function show(int $id)
    { 
        return new HotelResource($this->hotelService->findHotelId($id)); 
    }

    public function store(HotelStoreRequest $request)
    {                              
        $cityId = $request->input('city_id');
        $isCityExists = $this->cityService->findCityId($cityId);
                  
        return new HotelResource(
            $this->hotelService->create(
                $request->validated()
            )    
        );                     
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
   
    public function destroy(int $id): JsonResponse
    { 
        $hotel = $this->hotelService->findHotelId($id);
        
        if(!$hotel){ 
            return new JsonResponse([
               'message' => 'Hotel has not been found' 
            ], 404);
        }

        $hotel->delete();

        return new JsonResponse([
            'message' => 'Hotel deleted successfully' 
        ], 200);        
    }
}
