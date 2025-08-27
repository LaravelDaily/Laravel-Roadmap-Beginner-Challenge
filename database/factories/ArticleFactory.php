<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;

use App\Models\User;
use Database\Factories\FactoryHelper\FactoryHelper;
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
        $userId = FactoryHelper::getRandomModelId(User::class);
        $categoryId = FactoryHelper::getRandomModelId(Category::class);

        return [
            'title'=>fake()->sentence(2),
            'body'=>$this->faker->sentence(20),
//            'image'=> 'hz'
            'user_id'=>$userId,
            'category_id'=>$categoryId
        ];
    }
}
