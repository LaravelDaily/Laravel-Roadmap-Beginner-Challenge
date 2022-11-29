<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
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
        $authorCredentials = [
            'name' => 'Test User',
            'email' => 'test@test.com',
        ];

        if (! User::where($authorCredentials)->exists()) {
            $author = \App\Models\User::factory()->create($authorCredentials + [
                'password' => bcrypt('password'),
            ]);
        } else {
            $author = User::where($authorCredentials)->first();
        }

        for ($i=0; $i < 20; $i++) { // 20 article
            Article::factory()
                ->has(Category::factory()->count(rand(1, 6)))
                ->has(Tag::factory()->count(rand(0, 6)))
                ->state(['user_id' => $author->id])
                ->create();
        }

        for ($i=0; $i < 3; $i++) { // 3 user
            User::factory()
                ->has(
                    Article::factory(20)
                        ->has(Category::factory()->count(rand(1, 6)))
                        ->has(Tag::factory()->count(rand(0, 6)))
                )->create();
        }
    }
}
