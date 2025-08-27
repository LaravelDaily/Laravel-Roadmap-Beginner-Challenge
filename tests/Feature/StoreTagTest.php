<?php

namespace Tests\Feature;

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
            ->get(route('dashboard.tags.create'))
                ->assertViewIs('dashboard.tags.create')
                ->assertOk();
        }
        
    /** @test */
    public function can_store_tag()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('dashboard.tags.store'), [
                'name' => 'Example'
            ])
            ->assertSessionHas('success')
            ->assertRedirect(route('dashboard.tags.edit', Tag::firstOrFail()));

        $this->assertDatabaseHas('tags', [
            'name' => 'Example'
        ]);
    }

    /** @test */
    public function name_is_required()
    {

        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.tags.create'))
            ->post(route('dashboard.tags.store'), [
                'name' => null
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_cannot_be_larger_than_50_characters()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.tags.create'))
            ->post(route('dashboard.tags.store'), [
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
            ->from(route('dashboard.tags.create'))
            ->post(route('dashboard.tags.store'), [
                'name' => $tag->name,
            ])
            ->assertSessionHasErrors('name');
    }
}
