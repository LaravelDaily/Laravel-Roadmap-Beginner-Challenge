<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            // $this->faker->imageUrl('public/storage/articles', 650, 490, null, false),
            'category_id' => Category::inRandomOrder()
            ->first()->id,
        ];
    }
}
