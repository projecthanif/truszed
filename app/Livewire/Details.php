<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class Details extends Component
{
    public string $slug; // Define a public property to hold the ID

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
