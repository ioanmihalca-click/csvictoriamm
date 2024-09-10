<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title('Kickboxing în Baia Mare | Club Sportiv Victoria Maramureș')]
class Antrenamente extends Component
{
    public function render()
    {
        return view('livewire.antrenamente');
    }
}
