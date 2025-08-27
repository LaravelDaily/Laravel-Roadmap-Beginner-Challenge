<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Article $article) {
            //
        })->afterCreating(function (Article $article) {
            $tags = Tag::inRandomOrder()->limit(rand(1, 5))->get();

            foreach ($tags as $tag) {
                $article->tags()->attach($tag->id);
            }

            return $article;
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'category_id' => Category::inRandomOrder()->first(),
            'title' => $this->faker->sentence(rand(1, 10)),
            'body' => $this->faker->paragraph(rand(1, 3))
        ];
    }
}
