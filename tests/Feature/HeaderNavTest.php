<?php

namespace Tests\Feature;

use App\Livewire\HeaderNav;
use Tests\TestCase;

class HeaderNavTest extends TestCase
{
    public function test_homepage_renders_sticky_header_nav(): void
    {
        $this->get(route('prima-pagina'))
            ->assertOk()
            ->assertSeeLivewire(HeaderNav::class)
            ->assertSee('CS Victoria Maramureș')
            ->assertSee('Sesiune probă')
            ->assertSee('class="nav"', false);
    }

    public function test_brand_css_keeps_nav_sticky_without_overflow_hidden_on_root(): void
    {
        $css = file_get_contents(public_path('css/brand.css'));

        $this->assertNotFalse($css);
        $this->assertMatchesRegularExpression('/\.nav\{[^}]*position:sticky/', $css);
        $this->assertMatchesRegularExpression('/html,body\{[^}]*overflow-x:clip/', $css);
        $this->assertDoesNotMatchRegularExpression('/html,body\{[^}]*overflow-x:hidden/', $css);
    }
}
