<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelationshipTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_a_user_has_a_article(): void
    {
        $user = User::factory(1)->create()[0];
        $article = Article::factory(1)->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Article::class, $user->articles()->get()->first());

        $this->assertCount(1, $user->articles()->get());
    }

    public function test_a_article_has_a_category(): void
    {
        $category = Category::factory()->create();
        $article = Article::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->assertInstanceOf(Category::class, $article->category);

        $this->assertTrue($article->category->is($category));
    }

    public function test_a_article_has_a_tag(): void
    {
        $article = Article::factory()->create();
        $tag = Tag::factory()->create();
        $article->tags()->attach($tag->id);


        $this->assertTrue($article->tags()->first()->is($tag));
        $this->assertTrue($tag->articles()->first()->is($article));
    }
}
