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
            'title'=>$this->faker->word(),
            'text'=>$this->faker->paragraph(3),
            // 'file_path'=>'images/qvvGl4HbKmEP32l28vMMYG9DjT3sSZ32Y8w7FsHD.jpg',
            'file_path'=>'https://source.unsplash.com/random',
            'category_id' =>  Category::select('id')->get()->random()->id, 
        ];
    }
}
