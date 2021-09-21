<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ShowArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_single_article()
    {
        $this->withoutExceptionHandling();
        $article = Article::factory()
            ->forCategory()
            ->hasTags(2)
            ->create([
                'image' => UploadedFile::fake()->image('test.jpg'),
            ]);
        $response = $this->actingAs($article->user)
            ->get(route('articles.show', $article))
            ->assertViewIs('articles.show')
            ->assertOk();

        $response->assertSeeText($article->title);
        $response->assertSeeText($article->category->name);
        $response->assertSeeText($article->body);
        $response->assertSee($article->image);
        $response->assertSeeTextInOrder($article->tags->map->name->all());
    }
}
