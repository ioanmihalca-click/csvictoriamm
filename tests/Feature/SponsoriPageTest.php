<?php

namespace Tests\Feature;

use App\Livewire\Sponsori;
use Tests\TestCase;

class SponsoriPageTest extends TestCase
{
    public function test_sponsori_page_renders_brutalist(): void
    {
        $this->get('/sponsori')
            ->assertOk()
            ->assertSeeLivewire(Sponsori::class)
            ->assertSee('Devino')
            ->assertSee('sponsor')
            ->assertSee('De ce')
            ->assertSee('Vizibilitate brand')
            ->assertSee('Deduceri fiscale')
            ->assertSee('RO25CECEB00030RON2739983')
            ->assertSee('CEC Bank')
            ->assertSee('CECEROBUXXX')
            ->assertSee('Donație', false)
            ->assertDontSee('rounded-xl')
            ->assertDontSee('font-roboto-condensed')
            ->assertDontSee('shadow-md');
    }
}
