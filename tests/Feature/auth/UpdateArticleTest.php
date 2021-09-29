<?php

namespace Tests\Feature\Auth;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function can_update_article()
    {
        $article = Article::factory()
            ->forUser()
            ->create([
                'title' => 'Old title',
                'body' => 'Old Lorem Ipsum',
                'image' => UploadedFile::fake()->image('old.jpg')
            ]);

        $this->actingAs($article->user)
            ->patch(route('auth.articles.update', $article), [
                'title' => 'Updated Title',
                'body' => 'Updated Lorem Ipsum',
                'image' => $newImage = UploadedFile::Fake()->image('new.jpg'),
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();
        
        $article->refresh();
        $this->assertEquals('Updated Title', $article->title);
        $this->assertEquals('Updated Lorem Ipsum', $article->body);
        $this->assertEquals("articles/{$newImage->hashName()}", $article->image);
    }

    /** @test */
    public function can_update_article_category()
    {
        $article = Article::factory()
            ->forUser()
            ->create();
        $category = Category::factory()->create();

        $this->actingAs($article->user)
            ->patch(route('auth.articles.update', $article), [
                'title' => $article->title,
                'body' => $article->body,
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
            ->patch(route('auth.articles.update', $article), [
                'title' => $article->title,
                'body' => $article->body,
                'tags' => $tags->pluck('id')->toArray()
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $tags->each(fn ($tag) => $tag->articles->contains($article));
    }


    /** @test */
    public function title_cannot_be_updated_to_null()
    {
        $article = Article::factory()
            ->forUser()
            ->create();

        $this->actingAs($article->user)
            ->patch(route('auth.articles.update', $article), [
                'title' => null,
            ])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function title_cant_be_updated_to_more_than_255_characters()
    {
        $article = Article::factory()
            ->forUser()
            ->create();

        $this->actingAs($article->user)
            ->patch(route('auth.articles.update', $article), [
                'title' => str_repeat('x',256),
            ])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function body_cannot_be_udpated_to_null()
    {
        $article = Article::factory()
            ->forUser()
            ->create();

        $this->actingAs($article->user)
            ->patch(route('auth.articles.update', $article), [
                'body' => null,
            ])
            ->assertSessionHasErrors('body');
    }
}
