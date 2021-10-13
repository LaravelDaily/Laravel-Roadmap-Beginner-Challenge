<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_edit_form()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.categories.edit', $category))
            ->assertViewIs('dashboard.categories.edit')
            ->assertOk();

        $response->assertSee($category->name);
        $response->assertSee(route('dashboard.categories.update', $category));
    }

    /** @test */
    public function can_update_a_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['name' => 'Old']);

        $this->actingAs($user)
            ->from(route('dashboard.categories.edit', $category))
            ->patch(route('dashboard.categories.update', $category), [
                'name' => 'Updated',
            ])
            ->assertSessionHas('success')
            ->assertRedirect(route('dashboard.categories.edit', $category));

        $this->assertEquals('Updated', $category->fresh()->name);
    }

    /** @test */
    public function cannot_update_to_empty_name()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.categories.edit', $category))
            ->patch(route('dashboard.categories.update', $category), [
                'name' => null,
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function cannot_update_to_name_with_more_than_50_characters()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.categories.edit', $category))
            ->patch(route('dashboard.categories.update', $category), [
                'name' => str_repeat('x', 51)
            ])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function cannot_update_name_to_the_name_of_another_category()
    {
        $user = User::factory()->create();
        $categoryA = Category::factory()->create(['name' => 'Unique']);
        $categoryB = Category::factory()->create();

        $this->actingAs($user)
            ->from(route('dashboard.categories.edit', $categoryB))
            ->patch(route('dashboard.categories.update', $categoryB), [
                'name' => $categoryA->name
            ])
            ->assertSessionHasErrors('name');
    }
}
