<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public $images = [
        '1002-200x300.jpg',
        '1027-200x300.jpg',
        '237-200x300.jpg',
        '290-200x300.jpg',
        '362-200x300.jpg',
        '37-200x300.jpg',
        '58-200x300.jpg',
        '611-200x300.jpg',
        '727-200x300.jpg',
        '73-200x300.jpg',
        '819-200x300.jpg',
        '980-200x300.jpg',
        '996-200x300.jpg',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'title' => fake()->sentence(5, true),
            'article' => fake()->paragraphs(3, true),
            'photo' => fake()->randomElement($this->images),
        ];
    }
}
