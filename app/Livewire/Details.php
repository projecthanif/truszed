<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\View;
use Livewire\Component;

class Details extends Component
{
    public string $slug; // Define a public property to hold the Slug form the route

    public function render()
    {
        $property = Property::where([
            'slug' => $this->slug
        ])->get()->first();

        // View::create([
        //     'property_id' => $property->id,
        //     'agent_id' => $property->agent_id,
        //     'no_of_views' => 1
        // ]);

        return view('livewire.details', [
            'property' => $property
        ])
            ->layout('components.layouts.detail_layout');
    }
}
