<?php

namespace Tests\Feature\Auth;

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
            ->delete(route('auth.articles.destroy', $article))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNotNull($article->fresh()->deleted_at);
    }
}
