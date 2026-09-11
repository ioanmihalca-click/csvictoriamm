<?php

namespace Tests\Feature;

use Tests\TestCase;

class GymAddressTest extends TestCase
{
    public function test_homepage_shows_current_gym_address(): void
    {
        $this->get(route('prima-pagina'))
            ->assertOk()
            ->assertSee('str. carpați nr. 29')
            ->assertSee('◆ str. carpați nr. 29 (piața izvoare) · sala principală')
            ->assertDontSee('Lucaciu', false);
    }

    public function test_contact_page_shows_current_gym_address(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('str. Carpați nr. 29 (Piața Izvoare) · sala principală')
            ->assertDontSee('Lucaciu', false);
    }

    public function test_footer_shows_current_gym_address(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Str. Carpați nr. 29 · Piața Izvoare');
    }

    public function test_structured_data_uses_current_street_address(): void
    {
        $this->get(route('prima-pagina'))
            ->assertOk()
            ->assertSee('"streetAddress": "Str. Carpați nr. 29"', false)
            ->assertSee('Strada Carpați nr. 29 (Piața Izvoare) din Baia Mare', false);

        $this->get(route('blog.index'))
            ->assertOk()
            ->assertSee('"streetAddress": "Str. Carpați nr. 29"', false)
            ->assertDontSee('Lucaciu', false);
    }
}
