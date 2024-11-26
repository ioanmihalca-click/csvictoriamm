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
        // Obține elementele sortate după prioritate sau data creării
        $galleryItems = Gallery::orderBy('priority', 'asc')->get(); // sau 'created_at', 'desc'

        return view('livewire.galerie', [
            'galleryItems' => $galleryItems
        ]);
    }
}
