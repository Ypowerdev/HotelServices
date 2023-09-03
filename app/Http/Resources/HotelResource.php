<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
       return [
            'adress' =>$this->adress, 
            'coordinates' => $this->coordinates,
            'city_id' => $this->city_id, 
            'name' => $this->name            
       ]; 
    }
}
