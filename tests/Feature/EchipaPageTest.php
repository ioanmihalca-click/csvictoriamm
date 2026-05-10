<?php

namespace Tests\Feature;

use App\Livewire\Echipa;
use App\Models\PerformanceAthlete;
use Tests\TestCase;

class EchipaPageTest extends TestCase
{
    public function test_echipa_page_renders_with_athletes_and_crew(): void
    {
        $athletes = PerformanceAthlete::active()->ordered()->get();

        $response = $this->get('/echipa');

        $response->assertOk()
            ->assertSeeLivewire(Echipa::class)
            ->assertSee('Oamenii din')
            ->assertSee('spatele clubului')
            ->assertSee('Grupa de')
            ->assertSee('Ioan Mihalca')
            ->assertSee('Stefan Benzar')
            ->assertSee('Cristina Tăut', false)
            ->assertSee('Membri de onoare')
            ->assertDontSee('rounded-full')
            ->assertDontSee('font-roboto-condensed');

        if ($athletes->isNotEmpty()) {
            $response->assertSee($athletes->first()->name);
        }
    }
}
