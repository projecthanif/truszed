<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;

    public function render()
    {
        $properties = \App\Models\Property::paginate(12);

        $admin = User::where([
            'role' => 'admin'
        ])->get('id');
        return view('livewire.properties', [
            'properties' => $properties,
        ]);
    }
}
