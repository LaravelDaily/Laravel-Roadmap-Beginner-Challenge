<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreArticleTest extends TestCase
{
    /** @test */
    public function can_store_article()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('article', $attributes = [
                'title' => 'Example Test',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('articles', $attributes);
    }
}
