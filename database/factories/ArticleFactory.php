<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Services\RandomImage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'title' => $this->faker->text(rand(25,50)),
            'fulltext' => $this->faker->text(rand(300,1000)),
            'image' => RandomImage::getLegacyImageUri(env('PERCENTAGE_OF_ARTICLES_WITH_IMAGES',100)),
            'category_id' => Category::orderByRaw('rand()')->first()->id,
            'user_id' => null
        ];
    }
}