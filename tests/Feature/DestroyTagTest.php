<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_destroy_tag()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();

        $this->actingAs($user)
            ->delete(route('dashboard.tags.destroy', $tag))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNotNull($tag->fresh()->deleted_at);
    }
}
