<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Resources\HotelResource; 
use App\Http\Requests\HotelStoreRequest; 
use Illuminate\Http\Response;

class HotelController extends Controller
{
    public function list()
    { 
        return HotelResource::collection(Hotel::all());         
    }

    public function show(int $id)
    { 
        return new HotelResource(Hotel::findOrFail($id)); 
    }

    public function store(HotelStoreRequest $request)
    {                              
        $createdHotel = Hotel::create($request->validated()); 

        return new HotelResource($createdHotel);        
    } 

    public function update(HotelStoreRequest $request, Hotel $hotel)
    { 
        $hotelId = $hotel->findOrFail($request->route('id')); 

        $hotelId->update($request->validated());  

        return new HotelResource($hotelId); 
    }

    public function destroy(Hotel $hotel)
    { 
        $hotel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
