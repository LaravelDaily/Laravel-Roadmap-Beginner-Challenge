<?php

namespace Database\Factories;

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
        return [
            'user_id' => 1,
            'category_id' => rand(1, 10),
            'title' => fake()->sentence(),
            'excerpt'=> fake()->paragraph(),
            'body' => fake()->text(),
            'image_path' => 'home.jpg'
        ];
    }
}
