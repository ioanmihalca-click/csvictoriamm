<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Competitii | Club Sportiv Victoria Maramureș')]
class Competitii extends Component
{
    public function render()
    {
        return view('livewire.competitii');
    }
}
