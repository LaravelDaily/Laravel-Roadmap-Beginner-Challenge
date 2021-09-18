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
                'image' => $oldImage = UploadedFile::fake()->image('old.jpg')
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
                'category' => $category->id
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertTrue($article->fresh()->category->is($category));
    }

    /** @test */
    public function can_update_its_tags()
    {
        $this->withoutExceptionHandling();
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
}
