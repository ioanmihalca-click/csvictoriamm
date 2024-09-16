<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Kickboxing în Baia Mare | Club Sportiv Victoria Maramureș')]
class Galerie extends Component
{
    public function render()
    {
        $galleryItems = Gallery::all();

        return view('livewire.galerie', [
            'galleryItems' => $galleryItems
        ]);
    }
}