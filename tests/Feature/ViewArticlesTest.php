<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewArticlesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_articles_index()
    {
        $user = User::factory()->create();

        $articles = Article::factory()
            ->count(9)
            ->create()
            ->sortByDesc('created_at');

        $response = $this->actingAs($user)
            ->get(route('dashboard.articles.index'))
            ->assertViewIs('dashboard.articles.index')
            ->assertViewHas(['articles' => fn ($retrieved) => $retrieved->pluck('id')->all() === $articles->pluck('id')->all()])
            ->assertOk();

        $response->assertSee(route('dashboard.articles.create'));
        $response->assertSeeTextInOrder($articles->map->title->all());
        $response->assertSeeTextInOrder($articles->map->created_at->all());
        $response->assertSeeInOrder($articles->map->url->all());
        $response->assertSeeInOrder($articles->map(fn ($article) => route('dashboard.articles.edit', $article))->flatten()->all());
        $response->assertSeeInOrder($articles->map(fn ($article) => route('dashboard.articles.destroy', $article))->flatten()->all());
    }

    /** @test */
    public function it_paginates_articles_from_blocks_of_10s()
    {
        $user = User::factory()->create();
        $newArticles = Article::factory()->count(10)->create();
        $oldArticle = Article::factory()->create(['created_at' => now()->subDay()]);

        $response = $this->actingAs($user)
            ->get(route('dashboard.articles.index'))
            ->assertOk();

        $response->assertSeeInOrder($newArticles->map->title->all());
        $response->assertDontSee($oldArticle->title);
    }
}
