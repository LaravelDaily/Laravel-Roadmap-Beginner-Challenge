<?php

namespace Tests\Feature\Manage\Category;

use App\Http\Controllers\ManageCategoryController;
use App\Models\Category;
use Tests\TestCase;

class CategoryCrudTest extends TestCase
{
    public function test_admin_can_create_category()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $sendRequest = fn() => $this->post(action([ManageCategoryController::class, 'store']), [
            'name' => 'Category 0',
        ]);

        $sendRequest()
            ->assertRedirect(route('article.index'));

        $this->login();

        $this->get(action([ManageCategoryController::class, 'create']))
            ->assertSuccessful();

        $sendRequest()
            ->assertRedirect(action([ManageCategoryController::class, 'create']))
            ->assertSessionHas('success');

        $this->assertDatabaseHas(Category::class, [
            'name' => 'Category 0',
        ]);

    }
}
