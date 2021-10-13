<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_edit_form()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.tags.edit', $tag))
            ->assertViewIs('dashboard.tags.edit')
            ->assertOk();

        $response->assertSee($tag->name);
        $response->assertSee(route('dashboard.tags.update', $tag));
    }

    /** @test */
    public function can_update_a_tag()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['name' => 'Old']);

        $this->actingAs($user)
            ->from(route('dashboard.tags.edit', $tag))
            ->patch(route('dashboard.tags.update', $tag), [
                'name' => 'Updated',
            ])
            ->assertSessionHas('success')
            ->assertRedirect(route('dashboard.tags.edit', $tag));

        $this->assertEquals('Updated', $tag->fresh()->name);
    }

    /** @test */
    public function cannot_update_to_empty_name()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.tags.edit', $tag))
            ->patch(route('dashboard.tags.update', $tag), [
                'name' => null,
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function cannot_update_to_name_with_more_than_50_characters()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.tags.edit', $tag))
            ->patch(route('dashboard.tags.update', $tag), [
                'name' => str_repeat('x', 51)
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function cannot_update_name_to_the_name_of_another_Tag()
    {
        $user = User::factory()->create();
        $tagA = Tag::factory()->create(['name' => 'Unique']);
        $tagB = Tag::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.tags.edit', $tagB))
            ->patch(route('dashboard.tags.update', $tagB), [
                'name' => $tagA->name
            ])
            ->assertSessionHasErrors('name');
    }
}
