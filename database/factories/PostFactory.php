<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(2, true),
            'user_id' => 1,
            'category_id' => rand(1,10),
            'title' => $this->faker->words(5, true),
            'post' => $this->faker->text(200),
        ];
    }
}
