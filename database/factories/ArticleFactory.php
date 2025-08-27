<?php

namespace Database\Factories;

use App\Models\Article;
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
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(2),
            'body' => $this->faker->paragraph(20, true),
            'thumbnail' => null,
            'user_id' => 1,
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
