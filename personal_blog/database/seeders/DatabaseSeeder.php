<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CountriesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        Category::factory(20)->create();
        Tag::factory(20)->create();
        Article::factory(30)->create();
        ArticleTag::factory(50)->create();
    }
}
