<?php

namespace Http\Controllers;

use App\Http\Controllers\JsonArticleController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class JsonArticleControllerTest extends TestCase
{
    public function test_index_shows_all_articles()
    {
        Article::factory()->count(5)->has(Tag::factory()->count(3))->create();

        $this->get(action([JsonArticleController::class, 'index']))
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                $json->has('data', 5)
                    ->has('data.0', function (AssertableJson $json) {
                        $json
                            ->has('category_id')
                            ->has('tags')
                            ->has('title')
                            ->has('text')
                            ->has('image')
                            ->etc();
                    });
            });
    }

    public function test_detail_shows_one_blog_post()
    {
        $article = Article::factory()->create();

        $this->get(action([JsonArticleController::class, 'show'], $article->id))
            ->assertSuccessful()
            ->assertJson(fn(AssertableJson $json) => $json
                ->whereType('id', 'integer')
                ->whereAllType([
                    'category_id' => 'string',
                    'tags' => 'array',
                    'title' => 'string',
                    'text' => 'string',
                    'image' => 'string',
                ])
                ->where('id', $article->id)
                ->etc()
            );
    }
}
