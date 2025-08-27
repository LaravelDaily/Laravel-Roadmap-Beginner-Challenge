<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = Category::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->word(),
            'full_text' => $this->faker->text(),
            'category_id' => $this->faker->randomElement($categories)
        ];
    }
}
