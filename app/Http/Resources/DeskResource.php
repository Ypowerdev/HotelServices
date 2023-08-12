<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            'id' => $this->id, 
            'name' => $this->name, 
            'price' => $this->price,
            'hotel_id' => $this->hotel_id, 
            'parent_id' => $this->parent_id
       ]; 
    }
}
