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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory(25)->create();
        $tags = Tag::factory(25)->create();
        
        Article::factory(25)->create()->each(function(Article $article) use ($tags, $categories) {
            $article->category()->associate($categories->random())->save();
            $article->tags()->attach($tags->random(rand(0, 3))->pluck('id'));
        });
    }
}
