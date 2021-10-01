<?php

namespace Tests\Feature\Auth;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_create_form()
    {
        $user = User::factory()->create();
        
        $this->actingAs($user)
            ->get(route('auth.tags.create'))
                ->assertViewIs('auth.tags.create')
                ->assertOk();
        }
        
    /** @test */
    public function can_store_tag()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('auth.tags.store'), [
                'name' => 'Example'
            ])
            ->assertSessionHas('tag.created')
            ->assertRedirect(route('auth.tags.edit', Tag::firstOrFail()));

        $this->assertDatabaseHas('tags', [
            'name' => 'Example'
        ]);
    }

    /** @test */
    public function name_is_required()
    {

        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.tags.create'))
            ->post(route('auth.tags.store'), [
                'name' => null
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_cannot_be_larger_than_50_characters()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.tags.create'))
            ->post(route('auth.tags.store'), [
                'name' => str_repeat('x', 51)
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_cannot_be_repeated()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.tags.create'))
            ->post(route('auth.tags.store'), [
                'name' => $tag->name,
            ])
            ->assertSessionHasErrors('name');
    }
}
