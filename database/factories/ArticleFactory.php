<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'full_text' => $this->faker->paragraphs(rand(3, 7), true),
            'category_id' => Category::pluck('id')->random(),
            //'image' => Str::random(10)
        ];
    }
}
