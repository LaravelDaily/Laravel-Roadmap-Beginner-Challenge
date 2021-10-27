<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
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
            'text' => collect($this->faker->paragraphs(2))->map(fn ($item) => "{$item}")->implode(''),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::factory(),
        ];
    }
}
