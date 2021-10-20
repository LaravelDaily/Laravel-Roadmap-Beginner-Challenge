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
        //dd(Category::factory()->create()->id);
        $categories = Category::all();
        $id = rand(1, sizeof($categories) - 1);

        return [
            'title' => $this->faker->unique()->sentence(6, true),
            'full_text' => $this->faker->paragraphs(6, true),
            'image' => $this->getImagePath($this->faker->image(storage_path('/app/public'), 640, 480)),
            'category_id' =>  $categories[$id]->id,
        ];
    }

    public function getImagePath($callback): string
    {
        $imagePathArr = explode(DIRECTORY_SEPARATOR, $callback);
        $imagePath = $imagePathArr[sizeof($imagePathArr) - 1];
        return $imagePath;
    }
}
