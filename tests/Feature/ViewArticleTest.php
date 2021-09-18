<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ViewArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_single_article()
    {
        $article = Article::factory()->forUser()->create([
            'title' => 'Example Title',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ]);

        $response = $this->actingAs($article->user)
            ->get(route('articles.show', $article))
            ->assertViewIs('articles.show')
            ->assertOk();

        $response->assertSeeText('Example Title');
        $response->assertSeeText('Lorem ipsum dolor sit amet, consectetur adipiscing elit');
        $response->assertSee($article->image);
    }
}
