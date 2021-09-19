<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoreArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_store_article()
    {
        Storage::fake();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('articles', $attributes = [
                'title' => 'Example Title',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'image' => $image = UploadedFile::fake()->image('test.jpg'),
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();
            
        tap(Article::firstOrFail(), function ($article) use ($image, $user, $attributes) {
            $this->assertDatabaseHas('articles', [
                'title' => $attributes['title'],
                'body' => $attributes['body'],
                'image' => $image->hashName()
            ]);
            $user->articles()->first()->is($article);
        });
        Storage::assertExists($image->hashName());
    }

    /** @test */
    public function image_can_be_optional()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('articles', [
                'title' => 'Example Test',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();
        
        tap(Article::firstOrFail(), function ($article) {
            $this->assertDatabaseHas('articles', [
                'title' => $article->title,
                'body' => $article->body,
                'image' => null
            ]);
        });
    }

    /** @test */
    public function title_is_required()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('articles', [
                'title' => null,
            ])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function title_cant_be_more_than_255_characters()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('articles', [
                'title' => str_repeat('x',256),
            ])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function body_is_required()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('articles', [
                'body' => null,
            ])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function image_must_be_an_image()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('articles', [
                'image' => 'not-an-image'
            ])
            ->assertSessionHasErrors('image');
    }

    /** @test */
    public function guests_cannot_post_articles()
    {
        $this->post('articles')
            ->assertSessionHasNoErrors()
            ->assertRedirect();
    }
}
