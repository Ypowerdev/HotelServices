<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $fillable = [
        'name', 
        'price', 
        'hotel_id', 
        'parent_id'
    ];
    
    public $timestamps = false;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
   
}
