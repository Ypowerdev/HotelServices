<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Resources\HotelResource; 
use App\Http\Requests\HotelStoreRequest; 
use Illuminate\Http\Response;
use App\Services\Hotel\HotelMethods;

class HotelController extends Controller
{
    public function list()
    { 
        return HotelResource::collection(Hotel::all());         
    }

    public function show(int $id, HotelMethods $hotel )
    { 
        return new HotelResource($hotel->findHotelId($id)); 
    }

    public function store(HotelStoreRequest $request)
    {                              
        $createdHotel = Hotel::create($request->validated()); 

        return new HotelResource($createdHotel);        
    } 

    public function update(HotelStoreRequest $request, HotelMethods $hotel)
    { 
        $hotelId = $request->route('id');
        $hotel = $hotel->findHotelId($hotelId); 
        $hotel->update($request->validated());  

        return new HotelResource($hotelId); 
    }

    public function destroy(Hotel $hotel)
    { 
        $hotel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
