<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create(['name' => 'Mr. Admin', 'email' => 'admin@admin.com']);
        Category::factory(10)->create();
        Tag::factory(10)->create();
        Article::factory(20)->create();

        $tags = Tag::all();

        Article::all()->each(function ($article) use ($tags) {
            $article->tags()->sync(
                $tags->random(rand(2, 4))->pluck('id')->toArray()
            );
        });
    }
}
