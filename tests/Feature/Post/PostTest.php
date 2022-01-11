<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function test_render_home_screen_with_latest_posts()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->get('/');

        $this->assertStringContainsString($post->title, $response->getContent());
    }
}
