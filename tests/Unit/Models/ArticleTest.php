<?php

namespace Tests\Unit\Models;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_an_excerpt_getter()
    {
        $article = (new Article)->forceFill([
            'body' => str_repeat('x', 200),
        ]);

        $this->assertStringContainsString('x ...', $article->excerpt);

        $article->forceFill([
            'body' => str_repeat('x', 155),
        ]);

        $this->assertStringNotContainsString('...', $article->excerpt);
    }

    /** @test */
    public function it_has_an_url_getter()
    {
        $article = Article::factory()->create();

        $this->assertEquals(route('articles.show', $article), $article->url);
    }

    /** @test */
    public function it_has_an_dashboard_url_getter()
    {
        $article = Article::factory()->create();

        $this->assertEquals(route('auth.articles.show', $article), $article->dashboardUrl);
    }
}
