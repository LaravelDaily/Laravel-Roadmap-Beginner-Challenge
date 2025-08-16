<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    private $tagNames = array(
        "Content Marketing",
        "SEO",
        "Writing Tips",
        "Blog Promotion",
        "Audience Engagement",
        "Social Media",
        "Traffic Generation",
        "Blogging Strategies",
        "Monetization",
        "Analytics"
    );
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'name' => fake()->words(2, true),
            'name' => fake()->unique()->randomElement($this->tagNames),
        ];
    }
}
