<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            ArticleSeeder::class
        ]);

        foreach (Article::all() as $article){
            $article->tags()->attach(array_rand(range(1, 10), rand(1,5)));
        }
    }
}
