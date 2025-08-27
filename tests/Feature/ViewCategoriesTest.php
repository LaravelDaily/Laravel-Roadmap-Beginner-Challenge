<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_categories_index()
    {
        $user = User::factory()->create();

        $categories = Category::factory()->count(9)->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.categories.index'))
            ->assertViewIs('dashboard.categories.index')
            ->assertViewHas(['categories' => fn ($retrieved) => $retrieved->pluck('id')->all() === $categories->pluck('id')->all()])
            ->assertOk();

        $response->assertSee(route('dashboard.categories.create'));
        $response->assertSeeTextInOrder($categories->map->name->all());
        $response->assertSeeTextInOrder($categories->map->created_at->all());
        $response->assertSeeInOrder($categories->map(fn ($article) => route('dashboard.categories.edit', $article))->flatten()->all());
        $response->assertSeeInOrder($categories->map(fn ($article) => route('dashboard.categories.destroy', $article))->flatten()->all());
    }

    /** @test */
    public function it_paginates_categories_from_blocks_of_10s()
    {
        $user = User::factory()->create();
        $newCategories = Category::factory()->count(10)->create();
        $oldCategory = Category::factory()->create(['created_at' => now()->subDay()]);

        $response = $this->actingAs($user)
            ->get(route('dashboard.categories.index'))
            ->assertOk();

        $response->assertSeeInOrder($newCategories->map->name->all());
        $response->assertDontSee($oldCategory->name);
    }
}
