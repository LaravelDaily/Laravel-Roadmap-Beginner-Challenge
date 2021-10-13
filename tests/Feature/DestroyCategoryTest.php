<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_destroy_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $this->actingAs($user)
            ->delete(route('dashboard.categories.destroy', $category))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNotNull($category->fresh()->deleted_at);
    }
}
