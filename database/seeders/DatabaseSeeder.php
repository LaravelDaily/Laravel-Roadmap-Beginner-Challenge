<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => '$2y$10$5TZ/jmmfze/.4O8XN5Wi9u2w/HtsqYdP/uoYfbPKHb6fDq8k.hNe2',  // password
        ]);

        $posts = Post::factory(30)->create();
        $tags = Tag::factory(10)->create();

//         $tags = Tag::all();
//
//        Post::all()->each(function ($post) use ($tags) {
//            $post->tags()->attach(
//                $tags->random(rand(1, 3))->pluck('id')->toArray()
//            );
//        });

        foreach ($posts as $post) {
            $post->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray(),
            );
        }

    }
}
