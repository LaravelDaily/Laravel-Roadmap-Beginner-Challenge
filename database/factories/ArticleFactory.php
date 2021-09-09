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
        $number_title_words = $this->faker->numberBetween(2, 4);
        $number_paragraphs = $this->faker->numberBetween(2, 5);
        return [
            'title' => $this->faker->words($number_title_words, true),
            'text'  => $this->faker->paragraphs($number_paragraphs, true),
            'created_at' => $this->faker->dateTimeBetween('-4 weeks', '-1 day'),
            'updated_at' => $this->faker->dateTimeBetween('-4 weeks', '-1 day'),
            'image_path' => '',
            'category_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
