<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'property_thumbnail' => 'array'
        ];
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $searchTerm = $filters['search'];
            $query->where('address', 'like', '%' . $searchTerm . '%')
                ->orWhere('state_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('price', 'like', '%' . $searchTerm . '.000' . '%')
                ->orWhere('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('listing_type', 'like', '%' . $searchTerm . '%');
        }
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function views(): HasOne
    {
        return $this->hasOne(View::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function lga(): BelongsTo
    {
        return $this->belongsTo(LocalGovernmentArea::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
