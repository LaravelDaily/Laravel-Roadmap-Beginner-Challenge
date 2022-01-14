<?php

namespace Tests\Feature\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_admin_can_view_categories_list()
    {
        $response = $this->test_user_can_do_or_not('categories.index');

        $response->assertViewIs('admin.categories.index');
    }

    public function test_user_can_do_or_not(string $routeName, ?Model $model = null)
    {
        $response = $this->get(route($routeName, $model));

        $this->assertEquals('302', $response->getStatusCode());

        $response->assertRedirect(route('login'));


        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->actingAs($user);

        return $this->get(route($routeName, $model));
    }

    public function test_admin_can_create_category()
    {

        $response = $this->test_user_can_do_or_not('categories.create');

        $response->assertViewIs('admin.categories.create');

        $response = $this->post(route('categories.store'), [
            'name' => 'sport',
            'slug' => 'sport'
        ]);

        $response->assertValid();

        $response->assertRedirect(route('categories.index'));

        $this->assertDatabaseHas('categories', [
            'name' => 'sport',
            'slug' => 'sport'
        ]);
    }

    public function test_user_show_category_posts()
    {

        $category = Category::factory()->create([
            'name' => 'sport',
        ]);

        $response = $this->test_user_can_do_or_not('categories.show', $category);


        $response->assertViewIs('admin.categories.show');
        $response->assertViewHas(['category' => $category]);


    }

    public function test_assert_user_update_category()
    {

        $category = Category::factory()->create([
            'name' => 'sport',
            'slug' => 'sport',
        ]);

        $response = $this->post(route('categories.update', $category), [
            '_method' => 'put',
            '_token' => csrf_token(),
            'name' => 'laravel',
            'slug' => 'laravel'
        ]);

        $response->assertRedirect(route('login'));

        $user = User::factory()->create([
            'email' => 'admin@admin.com',
        ]);

        $response = $this->actingAs($user)->post(route('categories.update', $category), [
            '_method' => 'put',
            '_token' => csrf_token(),
            'name' => 'laravel',
            'slug' => 'laravel'
        ]);
        $response->assertValid();

        $response->assertRedirect(route('categories.index'));

        $this->assertDatabaseMissing('categories', [
            'name' => 'sport',
            'slug' => 'sport'
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'laravel',
            'slug' => 'laravel'
        ]);
    }

    public function test_assert_user_delete_category()
    {

        $category = Category::factory()->create([
            'name' => 'sport',
            'slug' => 'sport',
        ]);

        $response = $this->post($category->path(), [
            '_method' => 'delete',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect(route('login'));

        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);
        $response = $this->actingAs($user)->post(route('categories.destroy', $category), [
            '_method' => 'delete',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect(route('categories.index'));

        $this->assertDatabaseMissing('categories', [
            'name' => 'sport',
            'slug' => 'sport',
        ]);

    }


}
