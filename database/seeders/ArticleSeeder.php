<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Database\Factories\FactoryHelper\FactoryHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $articles = Article::factory(10)->create();
        $tags = Tag::factory(20)->create();

        $articles->each(function ($article) use ($tags){
            $article->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

//        $guestpages->each(function ($article){
//            $article->tags()->sync([FactoryHelper::getRandomModelId(Tag::class)]);
//        });


    }
}
