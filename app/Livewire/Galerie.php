<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Kickboxing în Baia Mare | Club Sportiv Victoria Maramureș')]
class Galerie extends Component
{
    public function render()
    {
        return view('livewire.galerie');
    }
}
