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

        $post = Post::factory()->create();

        $response = $this->get('/');

        $this->assertStringContainsString($post->title, $response->getContent());
    }

    public function test_get_posts_list()
    {


        $post1 = Post::factory()->create([
            'user_id' => 1
        ]);
        $post2 = Post::factory()->create([
            'user_id' => 1
        ]);
        $post3 = Post::factory()->create([
            'user_id' => 1
        ]);
        $post4 = Post::factory()->create([
            'user_id' => 1
        ]);
        $post5 = Post::factory()->create([
            'user_id' => 1
        ]);

        $response = $this->get('/posts');

        $response->assertViewIs('posts.index');
        $response->assertSee($post1->title);
        $response->assertSee($post2->title);
        $response->assertSee($post3->title);
        $response->assertSee($post4->title);
        $response->assertSee($post5->title);
    }

    public function test_get_create_post_page()
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('posts.create'));
        $response->assertForbidden();

        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);
        $response = $this->actingAs($user)->get(route('posts.create'));
        $response->assertOk();
    }

    public function test_store_post()
    {

        $response = $this->post(route('posts.store'), [
            'title' => 'this is title',
            'body' => 'this is body',
            'slug' => 'this-is-slug'
        ]);

        $response->assertForbidden();


        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => 'this is title',
            'body' => 'this is body',
            'slug' => 'this-is-slug'
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('posts', [
            'title' => 'this is title',
            'body' => 'this is body'
        ]);
    }

    public function test_get_edit_post_protected()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create();

        $response = $this->actingAs($user)->get("admin/posts/$post->id/edit");
        $response->assertForbidden();

        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);
        $response = $this->actingAs($user)->get("admin/posts/$post->id/edit");

        $response->assertOk();
        $this->assertStringContainsString('Edit Post', $response->getContent());
    }

    public function test_assert_post_is_updated()
    {

        $post = Post::factory()->create(['title' => 'this is title']);

        $response = $this->post("admin/posts/$post->id", [
            'title' => 'this is post',
            'body' => 'this is body',
            'slug' => 'this-is-slug'
        ]);

        $response->assertForbidden();

        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $response = $this->actingAs($user)->post("admin/posts/$post->id", [
            'title' => 'this is post',
            'body' => 'this is body',
            'slug' => 'this-is-slug'
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('posts', [
            'title' => 'this is post',
            'body' => 'this is body'
        ]);

        $this->assertDatabaseMissing('posts', [
            'title' => 'this is title',
        ]);
    }


}
