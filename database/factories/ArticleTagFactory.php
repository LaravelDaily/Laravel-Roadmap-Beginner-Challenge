<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleTagFactory extends Factory
{
    protected $model = ArticleTag::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'article_id' => Article::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
