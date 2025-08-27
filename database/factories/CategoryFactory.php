<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $number_category_words = $this->faker->numberBetween(1, 3);
        return [
            'name' => $this->faker->words($number_category_words, true),
            'created_at' => $this->faker->dateTimeBetween('-4 weeks', '-1 day'),
            'updated_at' => $this->faker->dateTimeBetween('-4 weeks', '-1 day'),
        ];
    }
}
