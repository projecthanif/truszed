<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Agent extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function property(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    // public function propertyView():HasOneThrough
    // {
    //     return $this->hasOneThrough(View::class, Property::class);
    // }
}
