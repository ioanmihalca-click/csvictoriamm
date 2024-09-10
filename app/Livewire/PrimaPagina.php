<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Kickboxing în Baia Mare | Club Sportiv Victoria Maramureș')]
class PrimaPagina extends Component
{
    public function render()
    {
        return view('livewire.prima-pagina');
    }
}
