<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Model\Category;

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
            'title' => $this->faker->paragraph(1),
            'text' => $this->faker->text(100),
            'url' => $this->faker->imageUrl(),
            'category_id' => Category::all()->random(1)->first()->id,
        ];
    }
}
