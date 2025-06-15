<?php

namespace App\Livewire;

use App\Models\Competition;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Competitii | Club Sportiv Victoria Maramureș')]
class Competitii extends Component
{
    public function render()
    {
        $competitions = Competition::orderBy('date', 'desc')->get();

        return view('livewire.competitii', [
            'competitions' => $competitions
        ]);
    }
}
