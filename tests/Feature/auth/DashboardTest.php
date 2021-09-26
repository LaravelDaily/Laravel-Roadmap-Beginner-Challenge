<?php

namespace Tests\Feature\Auth;

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
            ->assertViewIs('dashboard')
            ->assertOk();

        $response->assertSee(route('auth.articles.index'));
        $response->assertSee(route('auth.categories.index'));
        $response->assertSee(route('auth.tags.index'));
    }
}
