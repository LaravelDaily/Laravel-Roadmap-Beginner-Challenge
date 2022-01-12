<?php

namespace Tests\Feature\Database;

use App\Models\Post;
use Tests\TestCase;

class PostTableTest extends TestCase
{

    public function test_create_post_table_success()
    {
        $this->expectNotToPerformAssertions();

        \Artisan::call('migrate:fresh', ['--path' => '/database/migrations/post']);

    }

    public function test_post_table_has_columns()
    {

        \Artisan::call('migrate:fresh', ['--path' => ['/database/migrations/post', '/database/migrations/']]);


        Post::factory()->create([
            'title' => 'this is title',
            'body' => 'this is body',
            'slug' => 'this-is-slug',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'this is title',
            'body' => 'this is body',
            'slug' => 'this-is-slug',
            'user_id' => 1
        ]);

    }


}
