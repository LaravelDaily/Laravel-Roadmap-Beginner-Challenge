<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        $user = User::all()->random();
        $category = Category::all()->random();
        return [
            'user_id' => $user->id,
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->text,
            'img' => 'https://picsum.photos/200/300',
            'category_id' => $category->id,
        ];
    }
}
