<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
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
        Article::factory(10)->create()
            ->each(function ($article){
                $randomTags = Tag::all()->random(rand(1,4))->pluck('id');
                $article->tags()->attach($randomTags);
            });
    }
}
