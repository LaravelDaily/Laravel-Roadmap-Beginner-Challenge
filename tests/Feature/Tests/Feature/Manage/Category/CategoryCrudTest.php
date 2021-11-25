<?php

namespace Tests\Feature\Manage\Category;

use App\Http\Controllers\ManageCategoryController;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;

class CategoryCrudTest extends TestCase
{
    public function test_admin_can_create_category()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get(action([ManageCategoryController::class, 'create']))
            ->assertSuccessful();

        $this->post(action([ManageCategoryController::class, 'store']), [
            'name' => 'Category 0',
        ])
            ->assertRedirect(action([ManageCategoryController::class, 'create']))
            ->assertSessionHas('success');

        $this->assertDatabaseHas(Category::class, [
            'name' => 'Category 0',
        ]);

    }
}
