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

    public function show($id)
    { 
        return new HotelResource(Hotel::findOrFail($id)); 
    }

    public function store(HotelStoreRequest $request)
    {                              
        $createdService = Hotel::create($request->validated()); 

        return new HotelResource($createdService);        
    } 

    public function update(HotelStoreRequest $request, Hotel $service)
    { 
        $service->update($request->validated()); 
        
        return new HotelResource($service); 
    }

    public function destroy(Hotel $service)
    { 
        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
