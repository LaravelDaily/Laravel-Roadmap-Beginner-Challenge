<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EditArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_edit_article()
    {
        $article = Article::factory()
            ->forUser()
            ->create([
                'title' => 'Old title',
                'body' => 'Old Lorem Ipsum',
                'image' => UploadedFile::fake()->image('old.jpg')
            ]);

        $this->actingAs($article->user)
            ->patch("articles/{$article->id}", [
                'title' => 'Updated Title',
                'body' => 'Updated Lorem Ipsum',
                'image' => $newImage = UploadedFile::Fake()->image('new.jpg'),
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();
        
        $article->refresh();
        $this->assertEquals('Updated Title', $article->title);
        $this->assertEquals('Updated Lorem Ipsum', $article->body);
        $this->assertEquals($newImage->hashName(), $article->image);
    }

    /** @test */
    public function can_update_article_category()
    {
        $article = Article::factory()
            ->forUser()
            ->create();
        $category = Category::factory()->create();

        $this->actingAs($article->user)
            ->patch("articles/{$article->id}", [
                'category_id' => $category->id
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertTrue($article->fresh()->category->is($category));
    }

    /** @test */
    public function can_update_its_tags()
    {
        $article = Article::factory()
            ->forUser()
            ->create();
        $tags = Tag::factory()
            ->count(2)
            ->create();

        $this->actingAs($article->user)
            ->patch("articles/{$article->id}", [
                'tags' => $tags->pluck('id')->toArray()
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $tags->each(fn ($tag) => $tag->articles->contains($article));
    }

    /** @test */
    public function can_delete_article()
    {
        $article = Article::factory()->create();

        $this->actingAs($article->user)
            ->delete("articles/{$article->id}")
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNotNull($article->fresh()->deleted_at);
    }

    /** @test */
    public function guests_cannot_manage_articles()
    {
        $article = Article::factory()->create();

        $this->get(route('articles.show', $article))
            ->assertRedirect();

        $this->patch("articles/{$article->id}")
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->delete("articles/{$article->id}")
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNull($article->fresh()->deleted_at);
    }
}
