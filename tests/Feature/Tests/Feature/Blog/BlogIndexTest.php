<?php

namespace Tests\Feature\Blog;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_sees_posts()
    {
        $this->withoutExceptionHandling();

        $article1 = Article::factory()
            ->has(Tag::factory()->count(3))
            ->create();

        $article2 = Article::factory()
            ->has(Tag::factory()->count(3))
            ->create();

        $article3 = Article::factory()
            ->has(Tag::factory()->count(3))
            ->create();

        $this->get('/')
            ->assertSuccessful()
            ->assertSee($article1->title)
            ->assertSeeInOrder([
                $article2->title,
                $article3->title,
            ]);
    }
}
