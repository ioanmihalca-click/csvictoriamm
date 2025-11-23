<?php

namespace App\Livewire;

use App\Models\PerformanceAthlete;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Echipa | Club Sportiv Victoria Maramureș')]
class Echipa extends Component
{
    public function render()
    {
        $athletes = PerformanceAthlete::active()->ordered()->get();

        return view('livewire.echipa', [
            'athletes' => $athletes,
        ]);
    }
}
