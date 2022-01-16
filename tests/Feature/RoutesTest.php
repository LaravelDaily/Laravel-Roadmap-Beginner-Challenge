<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function test_home_screen_show_Login_only()
    {

        $response = $this->get('/');

        $response->assertStatus(200);

        $this->assertStringContainsString('Home', $response->getContent());
        $this->assertStringContainsString('Login', $response->getContent());
        $this->assertStringContainsString('About Me', $response->getContent());

        $this->assertStringNotContainsString('Dashboard', $response->getContent());
        $this->assertStringNotContainsString('Register', $response->getContent());


    }
}
