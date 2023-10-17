<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;

class ArticleSeeder extends Seeder {
    public function run(): void {
        if (Category::count() === 0) return;
        if (env('ARTICLES_TO_SEED',0) > 0) Article::factory(env('ARTICLES_TO_SEED'), [
            'user_id' => User::first()->id
        ])->create();
    }
}