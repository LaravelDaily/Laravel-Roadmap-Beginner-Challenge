<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_article()
    {
        $article = Article::factory()->create();

        $this->actingAs($article->user)
            ->delete(route('dashboard.articles.destroy', $article))
            ->assertSessionHasNoErrors()
            ->assertSessionHas('success')
            ->assertRedirect();

        $this->assertNotNull($article->fresh()->deleted_at);
    }
}
