<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagArticle>
 */
class TagArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $articles = Article::all()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        return [
            'article_id' => $this->faker->randomElement($articles),
            'tag_id' => $this->faker->randomElement($tags)
        ];
    }
}
