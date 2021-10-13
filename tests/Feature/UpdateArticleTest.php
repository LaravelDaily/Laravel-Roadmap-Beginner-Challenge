<?php

namespace Tests\Feature;

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
            ->create();
        $categories = Category::factory()->count(3)->create();
        $tags = Tag::factory()->count(3)->create();

        $response = $this->actingAs($article->user)
            ->get(route('dashboard.articles.edit', $article))
            ->assertViewIs('dashboard.articles.edit')
            ->assertViewHas('categories', fn ($retrieved) => $retrieved->pluck('id')->all() === $categories->pluck('id')->all())
            ->assertViewHas('tags', fn ($retrieved) => $retrieved->pluck('id')->all() === $tags->pluck('id')->all())
            ->assertOk();

        $response->assertSee(route('dashboard.articles.update', $article));
        $response->assertSee($article->title);
        $response->assertSee($article->body);
        $response->assertSee($article->category->name);
        $response->assertSeeTextInOrder($article->tags->map->name->all());
        $response->assertSeeTextInOrder($categories->map->name->all());
        $response->assertSeeTextInOrder($tags->map->name->all());
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
            ->patch(route('dashboard.articles.update', $article), [
                'title' => 'Updated Title',
                'body' => 'Updated Lorem Ipsum',
                'image' => $newImage = UploadedFile::Fake()->image('new.jpg'),
            ])
            ->assertSessionHasNoErrors()
            ->assertSessionHas('article.updated')
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
            ->patch(route('dashboard.articles.update', $article), [
                'title' => $article->title,
                'body' => $article->body,
                'category_id' => $category->id
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertTrue($article->fresh()->category->is($category));
    }

    /** @test */
    public function can_add_or_remove_tags()
    {
        $article =  Article::factory()->create();
        $toDetach =  Tag::factory()->create();
        $toAttach =  Tag::factory()->create();
        $article->tags()->attach($toDetach);

        $this->actingAs($article->user)
            ->patch(route('dashboard.articles.update', $article), [
                'title' => $article->title,
                'body' => $article->body,
                'added_tags' => [
                    $toAttach->id => $toAttach->id,
                ],
                'removed_tags' => [
                    $toDetach->id => $toDetach->id
                ],
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertFalse($article->tags->contains($toDetach));
        $this->assertTrue($article->tags->contains($toAttach));
    }


    /** @test */
    public function title_cannot_be_updated_to_null()
    {
        $article = Article::factory()
            ->forUser()
            ->create();

        $this->actingAs($article->user)
            ->patch(route('dashboard.articles.update', $article), [
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
            ->patch(route('dashboard.articles.update', $article), [
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
            ->patch(route('dashboard.articles.update', $article), [
                'body' => null,
            ])
            ->assertSessionHasErrors('body');
    }
}
