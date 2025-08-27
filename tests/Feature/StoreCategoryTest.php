<?php

namespace Tests\Feature;

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
            ->get(route('dashboard.categories.create'))
            ->assertViewIs('dashboard.categories.create')
            ->assertOk();
    }

    /** @test */
    public function can_store_category()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.categories.create'))
            ->post(route('dashboard.categories.store'), [
                'name' => 'Example'
            ])
            ->assertSessionHas('success')
            ->assertRedirect(route('dashboard.categories.edit', Category::firstOrFail()));

        $this->assertDatabaseHas('categories', [
            'name' => 'Example'
        ]);
    }

    /** @test */
    public function name_is_required()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.categories.create'))
            ->post(route('dashboard.categories.store'), [
                'name' => null
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function name_cannot_be_larger_than_50_characters()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.categories.create'))
            ->post(route('dashboard.categories.store'), [
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
            ->from(route('dashboard.categories.create'))
            ->post(route('dashboard.categories.store'), [
                'name' => $category->name,
            ])
            ->assertSessionHasErrors('name');
    }
}
