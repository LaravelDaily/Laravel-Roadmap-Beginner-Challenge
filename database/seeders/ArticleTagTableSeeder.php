<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArticleTableSeeder::class,
            TagTableSeeder::class
        ]);

        for($i = 0; $i < 3; $i++){
            $at = ArticleTag::firstOrCreate([
                'article_id'    => Article::inRandomOrder()->first()->id,
                'tag_id'        => Tag::inRandomOrder()->first()->id,
            ]);
        }
    }
}
