<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;
    public function render()
    {
        $properties = \App\Models\Property::paginate(10);
//        dd($properties->all());

        return view('livewire.properties', [
            'properties' => $properties
        ]);
    }
}
