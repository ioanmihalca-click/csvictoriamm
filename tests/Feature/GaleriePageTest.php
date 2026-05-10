<?php

namespace Tests\Feature;

use App\Livewire\Galerie;
use Tests\TestCase;

class GaleriePageTest extends TestCase
{
    public function test_galerie_page_renders_brutalist(): void
    {
        $this->get('/galerie')
            ->assertOk()
            ->assertSeeLivewire(Galerie::class)
            ->assertSee('Din sală')
            ->assertSee('Din ring')
            ->assertSee('gal-grid', false)
            ->assertDontSee('rounded-2xl')
            ->assertDontSee('cursor-zoom-in"', false);
    }
}
