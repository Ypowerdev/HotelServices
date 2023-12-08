<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class City extends Model
{

    protected $fillable = ['name','country_id'];
    public $timestamps = false;

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class, 'city_id', 'id');
    }
}
