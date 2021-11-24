<?php

namespace Tests\Feature\Blog;

use App\Models\Article;
use App\Models\Tag;
use Tests\TestCase;

class BlogIndexTest extends TestCase
{

    public function test_index_sees_post()
    {
        $this->withoutExceptionHandling();

        Article::factory()
            ->has(Tag::factory()->count(3))
            ->sequence(fn($sequence) => ['title' => 'Post ' . $sequence->index])
            ->create();

        $this->get('/')
            ->assertSuccessful()
            ->assertSee('Post 0');
    }

    public function test_index_sees_posts_in_order()
    {
        $this->withoutExceptionHandling();

        Article::factory()
            ->count(3)
            ->has(Tag::factory()->count(3))
            ->sequence(fn($sequence) => ['title' => 'Post ' . $sequence->index])
            ->create();

        $this->get('/')
            ->assertSuccessful()
            ->assertSeeInOrder([
                'Post 0',
                'Post 1',
                'Post 2',
            ]);
    }
}
