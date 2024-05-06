<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('truszed &mdash; trust, luxury, life')]
    public function render()
    {
        return view('livewire.index');
    }
}
