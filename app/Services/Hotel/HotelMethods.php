<?php

namespace App\Services\Hotel;

use App\Services\City\CityMethods;
use App\Models\Country; 
use App\Models\City; 
use App\Models\Hotel;
use App\Http\Resources\HotelResource; 


class HotelMethods
{ 

    public function list()
    { 
        return HotelResource::collection($this->hotelAll());
    }

    public function findCityId($cityId, CityMethods $city): City
    {                
        $city = $city->findCityId($cityId);         
        return $city;          
    }

    public function create($data): mixed 
    { 
        return Hotel::create($data);
    }

    public function update($id, array $data)
    { 
        $hotel = $this->findHotelId($id);
        $hotel->update($data);

        return $hotel;
    }

    public function findHotelId(mixed $id): Hotel
    { 
        return Hotel::findOrFail($id);
    }

    public function hotelAll(): mixed 
    { 
        return Hotel::all();
    }
   
    public function hotelDelete ()
    { 
        return (new City)->delete();
    }
    
    public function getActualHotels(): array
    { 
        $countries = Country::all(); 
        $result = []; 
        foreach ($countries as $country){ 
            foreach ($country->cities as $city){ 
               foreach ($city->hotels as $hotel){ 
                if(!isset($response[$country->country_code][$city->name])){ 
                    $result[$country->country_code][$city->name] = [];
                }        
                $result[$country->country_code][$city->name][] = $hotel;        
               }              
            }           
        }
        return $result;
    }     
}