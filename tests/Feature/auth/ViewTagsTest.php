<?php

namespace Tests\Feature\Auth;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewTagsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_tags_index()
    {
        $user = User::factory()->create();

        $tags = Tag::factory()->count(9)->create();

        $response = $this->actingAs($user)
            ->get(route('auth.tags.index'))
            ->assertViewIs('auth.tags.index')
            ->assertViewHas(['tags' => fn ($retrieved) => $retrieved->pluck('id')->all() === $tags->pluck('id')->all()])
            ->assertOk();

        $response->assertSee(route('auth.tags.create'));
        $response->assertSeeTextInOrder($tags->map->name->all());
        $response->assertSeeTextInOrder($tags->map->created_at->all());
        $response->assertSeeInOrder($tags->map(fn ($article) => route('auth.tags.edit', $article))->flatten()->all());
        $response->assertSeeInOrder($tags->map(fn ($article) => route('auth.tags.destroy', $article))->flatten()->all());
    }

    /** @test */
    public function it_paginates_tags_from_blocks_of_10s()
    {
        $user = User::factory()->create();
        $newtags = Tag::factory()->count(10)->create();
        $oldTag = Tag::factory()->create(['created_at' => now()->subDay()]);

        $response = $this->actingAs($user)
            ->get(route('auth.tags.index'))
            ->assertOk();

        $response->assertSeeInOrder($newtags->map->name->all());
        $response->assertDontSee($oldTag->name);
    }
}
