<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Echipa | Club Sportiv Victoria Maramureș')]
class Echipa extends Component
{
    public function render()
    {
        return view('livewire.echipa');
    }
}
