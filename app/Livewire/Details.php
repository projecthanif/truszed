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

        return view('livewire.details', [
            'property' => $property
        ])
            ->layout('components.layouts.detail_layout');
    }
}
