<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Hotel;


class City extends Model
{   
   
    protected $fillable = ['name','country_id'];     
    public $timestamps = false;

    public function country()
    { 
        return $this->belongsTo(Country::class, 'country_id', 'id');        
    }

    public function hotels()
    { 
        return $this->hasMany(Hotel::class, 'city_id', 'id');        
    }
}