<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Contact | Club Sportiv Victoria Maramureș')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
