<?php

namespace Tests\Feature\Auth;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ViewArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_single_article()
    {
        $article = Article::factory()
            ->forCategory()
            ->hasTags(2)
            ->create([
                'image' => UploadedFile::fake()->image('test.jpg'),
            ]);

        $response = $this->actingAs($article->user)
            ->get(route('auth.articles.show', $article))
            ->assertViewIs('auth.articles.show')
            ->assertOk();

        $response->assertSeeText($article->title);
        $response->assertSeeText($article->category->name);
        $response->assertSeeText($article->body);
        $response->assertSee($article->image);
        $response->assertSeeTextInOrder($article->tags->map->name->all());
    }

    /** @test */
    public function can_view_edit_article_form()
    {
        $article = Article::factory()
            ->forCategory()
            ->hasTags(2)
            ->create([
                'category_id' => null,
            ]);

        $response = $this->actingAs($article->user)
            ->get(route('auth.articles.edit', $article))
            ->assertViewIs('auth.articles.edit')
            ->assertOk();

        $response->assertSee(route('auth.articles.update', $article));
        $response->assertSee($article->title);
        $response->assertSee($article->body);
    }
}
