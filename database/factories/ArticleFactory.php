<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
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
//        $category = Category::factory()->count(1)->create()->first();

        return [
            "title" => $this->faker->paragraph(1),
            "text" => $this->faker->text(10000),
//            "img_url" => $this->faker->imageUrl,
//            "category_id" => $category->id
            "category_id" => Category::all()->random(1)->first()->id
        ];
    }
}
