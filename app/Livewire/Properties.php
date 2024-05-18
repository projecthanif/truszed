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
        $properties = Property::where([
            'admin_permission' => true
        ])->paginate(12);

        $admin = User::where('role', '!=', 'agent')->get('id');

        $featuredProperties = [];

        foreach ($properties as $property) {
            foreach ($admin as $key) {
                if ($property->agent_id === $key->id) {
                    $featuredProperties[] = $property;
                }
            }
        }

        // dd($featuredProperties);
        return view('livewire.properties', [
            'properties' => $properties,
            'featuredProperties' => $featuredProperties
        ]);
    }
}
