<?php

namespace App\Livewire;

use App\Models\Competition;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Competitii | Club Sportiv Victoria Maramureș')]
class Competitii extends Component
{
    public function render()
    {
        $competitions = Competition::where('is_active', true)
            ->orderBy('date', 'desc')
            ->get();

        $byYear = $competitions
            ->groupBy(fn (Competition $c) => $c->date->format('Y'))
            ->sortKeysDesc();

        return view('livewire.competitii', [
            'competitions' => $competitions,
            'byYear' => $byYear,
            'total' => $competitions->count(),
            'years' => $byYear->keys()->all(),
        ]);
    }
}
