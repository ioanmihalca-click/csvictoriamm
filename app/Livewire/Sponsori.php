<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Sponsori | Club Sportiv Victoria Maramureș')]
class Sponsori extends Component
{
    public function render()
    {
        return view('livewire.sponsori');
    }
}
