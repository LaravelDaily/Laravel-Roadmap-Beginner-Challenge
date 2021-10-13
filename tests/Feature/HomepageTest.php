<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_articles_from_recent_to_oldest()
    {
        $articles = collect([
            $old = Article::factory()->create(['created_at' => now()->subDay()]),
            $new = Article::factory()->create(),
        ])->sortByDesc('created_at');

        $response = $this->get('/')
            ->assertViewIs('home')
            ->assertViewHas('articles', fn ($retrieved) => 
                $retrieved->pluck('id')->all() === $articles->pluck('id')->all()
            )
            ->assertOk();

        $response->assertSee($articles->map->url->all());
        $response->assertSeeTextInOrder($articles->map->title->all());
        $response->assertSeeTextInOrder($articles->map->category->map->name->all());
        $response->assertSeeTextInOrder($articles->map->excerpt->all());
        $response->assertSee($articles->map->image->all());
    }

    /** @test */
    public function it_paginates_articles_from_blocks_of_10s()
    {
        $newArticles = Article::factory()->count(10)->create();
        $oldArticle = Article::factory()->create(['created_at' => now()->subDay()]);

        $response = $this->get('/')->assertOk();

        $response->assertSeeInOrder($newArticles->map->title->all());
        $response->assertDontSee($oldArticle->title);
    }
}
