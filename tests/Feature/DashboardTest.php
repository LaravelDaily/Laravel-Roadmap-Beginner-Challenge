<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertViewIs('dashboard.home')
            ->assertOk();

        $response->assertSee(route('dashboard.articles.index'));
        $response->assertSee(route('dashboard.categories.index'));
        $response->assertSee(route('dashboard.tags.index'));
    }
}
