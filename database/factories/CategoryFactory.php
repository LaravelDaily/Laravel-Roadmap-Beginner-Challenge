<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    private array $categoryNames = [
        "Electronics",
        "Fashion",
        "Home & Garden",
        "Books & Media",
        "Sports & Outdoors",
        "Beauty & Personal Care",
        "Food & Beverages",
        "Health & Wellness",
        "Toys & Hobbies",
        "Automotive",
        "Baby Products",
        "Pet Supplies",
        "Office Supplies",
        "Arts & Crafts",
        "Music & Instruments",
        "Travel",
        "Services",
        "Education",
        "Software",
        "Jewelry",
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'name' => fake()->word(2),
            'name' => fake()->unique()->randomElement($this->categoryNames),
        ];
    }
}
