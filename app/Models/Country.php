<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_code','name'];

    public $timestamps = false;

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }
}
