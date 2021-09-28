<?php

namespace Tests\Feature\Auth;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_create_form()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('auth.categories.create'))
            ->assertViewIs('auth.categories.create')
            ->assertOk();
    }

    /** @test */
    public function can_store_category()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.categories.create'))
            ->post(route('auth.categories.store'), [
                'name' => 'Example'
            ])
            ->assertSessionHas('category.created')
            ->assertRedirect(route('auth.categories.create'));

        $this->assertDatabaseHas('categories', [
            'name' => 'Example'
        ]);
    }

    /** @test */
    public function name_is_required()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.categories.create'))
            ->post(route('auth.categories.store'), [
                'name' => null
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_cannot_be_larger_than_50_characters()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.categories.create'))
            ->post(route('auth.categories.store'), [
                'name' => str_repeat('x', 51)
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_is_unique()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $this->actingAs($user)
            ->from(route('auth.categories.create'))
            ->post(route('auth.categories.store'), [
                'name' => $category->name,
            ])
            ->assertSessionHasErrors('name');
    }
}
