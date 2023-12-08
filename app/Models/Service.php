<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{

    protected $fillable = [
        'name',
        'price',
        'hotel_id',
        'parent_id',
    ];

    public $timestamps = false;

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

}
