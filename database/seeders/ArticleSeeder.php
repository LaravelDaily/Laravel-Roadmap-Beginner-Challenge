<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
        ->count(100)
        ->create();

        foreach (Article::all() as $article) {
            $tag =  Tag::inRandomOrder()->take(rand(2,4))->pluck('id');
            $article->tags()->attach($tag);
        }
    }
}
