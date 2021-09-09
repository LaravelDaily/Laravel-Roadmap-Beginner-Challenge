<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCategoryStore()
    {
        $this->actingAs($this->user);
        $response = $this
            ->post('admin/categories', [
                'name' => 'Random tag',
            ]);
        $response->assertRedirect('admin/categories');

        $category = Category::where('name', 'Random Tag')->first();
        $this->assertNotNull($category);

        $response = $this->get('admin/categories/'.$category->id.'/edit');     
        $response->assertStatus(200);
    }

    public function testCategoryIndex()
    {
        $this->actingAs($this->user);
        Category::factory()->create();
        $this->category = Category::inRandomOrder()->first();

        $response = $this->get('admin/categories/');
        $response->assertStatus(200);
        $response->assertViewHas('categories', function($categories) {
            return $categories->contains($this->category);
        });

        $categories = $response->original->getData()['categories'];
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $categories);
    }
    
    public function testCategoryUpdate()
    {
        $this->actingAs($this->user);
        Category::factory()->create();
        $category = Category::inRandomOrder()->first();
        $response = $this->put('admin/categories/' . $category->id, [
                'name' => 'Update Random tag',
            ]); 
        $response->assertRedirect('admin/categories');
        
        $category = Category::where('name', 'Update Random Tag')->first();
        $this->assertNotNull($category);              
        
        $view = $this->view('admin.categories.index',
            [
                'categories' => Category::all()
            ]);
        $view->assertSeeText('Update Random Tag');        
    }
    public function testCategoryDelete()
    {
        $this->actingAs($this->user);
        $response = $this->post('admin/categories', [
                'name' => 'Random tag',
            ]);
        $category = Category::where('name', 'Random Tag')->first();

        $response = $this->delete('admin/categories/'.$category->id);
        $response->assertRedirect('admin/categories');            
        $category = Category::where('name', 'Random Tag')->first();
        $this->assertNull($category);  
    }
    public function testGuestCannotAccesAdminCategories(){
        
        $response = $this->get('admin/categories/');
        $response->assertRedirect('login');

        Category::factory()->create();
        $category = Category::inRandomOrder()->first();
        $response = $this->delete('admin/categories/'.$category->id);        
        $response->assertRedirect('login');

    }
} 
