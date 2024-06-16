<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Property;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Title('truszed &mdash; trust, luxury, life')]
    public function render()
    {
        $properties = Property::where([
            'admin_permission' => true
        ])->get();

        $admin = User::where('role', '!=', 'agent')->get('id');

        $featuredProperties = [];

        foreach ($properties as $property) {
            foreach ($admin as $key) {
                if ($property->agent_id === $key->id) {
                    $featuredProperties[] = $property;
                }
            }
        }

//        dd($featuredProperties->slug);

        return view('livewire.index', [
            'properties' => $properties,
            'featuredProperties' => $featuredProperties
        ]);
    }
}
