<?php

namespace Database\Seeders;

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
        $categories = \App\Models\Category::factory(2)->create();
        $tags = \App\Models\Tag::factory(2)->create();

        $user = \App\Models\User::factory()
            ->hasArticles(52, [
                'category_id' => null,
            ])
            ->create([
                'name' => 'Bela Bloggor',
                'email' => 'bela@blog.de',
            ]);

        $user->articles()->each(function ($article) use ($categories, $tags) {
            $article->category()->associate($categories->random());
            $article->tags()->attach($tags->random());
        });
    }
}
