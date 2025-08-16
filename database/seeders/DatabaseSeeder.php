<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        // Create my default user
        if(!User::where('email','tyson.glore@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Tyson Glore',
                'email' => 'tyson.glore@gmail.com',
                'password' => 'password',
            ]);
        }

        $categories = Category::factory(20)->create();

        $tags = Tag::factory(10)->create();

        // Create 30 articles with random recycled categories
        Article::factory(30)
            ->recycle($categories)
            ->create();

        // Attach random amount of random recycled tags
        Article::all()->each(function ($article) use ($tags) {
            $article->tags()->attach($tags->random(random_int(1, 10)));
        });
    }
}
