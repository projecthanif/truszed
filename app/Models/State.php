<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lga(): HasMany
    {
        return $this->hasMany(LocalGovernmentArea::class);
    }

    public function property(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
