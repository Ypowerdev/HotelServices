<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Hotel;

class City extends Model
{   
    use HasFactory;

    protected $fillable = ['country_id','name']; 
    
    public $timestamps = false;

    public function country()
    { 
        return $this->belongsTo(Country::class);        
    }

    public function hotels()
    { 
        return $this->hasMany(Hotel::class);        
    }
}
