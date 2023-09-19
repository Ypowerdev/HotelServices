<?php

namespace App\Services\Hotel;

use App\Models\Country; 
use App\Models\City; 
use App\Models\Hotel;


class HotelMethods
{ 
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

    public function findHotelId(mixed $data)
    { 
        return Hotel::findOrFail($data);
    }
    
}