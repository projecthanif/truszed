<?php

namespace App\Livewire;

use Livewire\Component;

class Details extends Component
{
    public $id; // Define a public property to hold the ID

    public function render()
    {
        // dd($this->id);   

        return view('livewire.details')
            ->layout('components.layouts.detail_layout');
    }
}
