<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            $this->call([
                CategoryTableSeeder::class,
            ]);
            $articles = Article::factory()->count(3)->create([
                'category_id'   => Category::inRandomOrder()->first()->id
            ]);

        }catch(\Throwable $e){
            dd($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}
