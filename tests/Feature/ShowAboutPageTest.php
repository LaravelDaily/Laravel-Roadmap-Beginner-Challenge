<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowAboutPageTest extends TestCase
{
    /** @test */
    public function it_displays_the_about_me_page()
    {
        $this->get('/about-me')
            ->assertViewIs('about')
            ->assertOk();
    }
}
