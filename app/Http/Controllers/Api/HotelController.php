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
    public function list(HotelMethods $hotel)
    { 
        return $hotel->list();         
    }

    public function show(int $id, HotelMethods $hotel )
    { 
        return new HotelResource($hotel->findHotelId($id)); 
    }

    public function store(HotelStoreRequest $request, HotelMethods $hotel, CityMethods $city)
    {                              
        $cityId = $request->input('city_id');
        $isCityExists = $city->findCityId($cityId, $city);
                  
        return $hotel->create($request->validated());                          
    } 

    public function update(HotelStoreRequest $request, HotelMethods $hotel)
    { 
        $hotelId = $request->route('id');
        $hotel = $hotel->findHotelId($hotelId); 
        $hotel->update($request->validated());  

        return new HotelResource($hotelId); 
    }

    public function destroy(HotelMethods $hotel)
    { 
        $hotel->Hoteldelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
