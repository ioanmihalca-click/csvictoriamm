<?php

namespace Tests\Feature;

use App\Livewire\Competitii;
use App\Models\Competition;
use Tests\TestCase;

class CompetitiiPageTest extends TestCase
{
    public function test_competitii_page_renders_brutalist(): void
    {
        $latest = Competition::where('is_active', true)->orderByDesc('date')->first();

        $response = $this->get('/competitii');

        $response->assertOk()
            ->assertSeeLivewire(Competitii::class)
            ->assertSee('Pe ring')
            ->assertSee('Pe podium')
            ->assertSee('Sezon')
            ->assertDontSee('rounded-xl')
            ->assertDontSee('font-roboto-condensed')
            ->assertDontSee('hover:shadow-xl');

        if ($latest) {
            $response->assertSee($latest->title)
                ->assertSee($latest->location);
        }
    }
}
