<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

//use Illuminate\Http\UploadedFile;
//use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

class ArticleControllerTest extends TestCase
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
    public function testArticleStore()
    {
        $this->actingAs($this->user);

        Category::factory()->create();
        $category = Category::inRandomOrder()->first();

        $response = $this
            ->post('admin/articles', [
                'title' => 'Random title',
                'text' => 'Random text',
                'category_id' => $category->id,
            ]);
        $response->assertRedirect('admin/articles');

        $article = Article::where('title', 'Random title')->first();
        $this->assertNotNull($article);

        $response = $this->get('admin/articles/'.$article->id.'/edit');     
        $response->assertStatus(200);
    }
    public function testArticleUpdate()
    {
        $this->actingAs($this->user);

        Category::factory()->create();
        $category = Category::inRandomOrder()->first();

        Article::factory()->create(['category_id' => $category->id]);
        $article = Article::inRandomOrder()->first();

        $response = $this->put('admin/articles/' . $article->id, [
                'title' => 'Update Random Article',
                'text' => $article->text,
                'category_id' => $article->category_id,
            ]);

        $response = $this->put('admin/articles/' . $article->id, [
            'title' => 'Update Random Article',
            'text' => $article->text,
            'category_id' => $article->category_id,
            'image_path' => '1'.$article->image_path,
        ]);            
        $response->assertRedirect('admin/articles');
        
        $article = Article::where('title', 'Update Random Article')->first();
        $this->assertNotNull($article);              
    }
    public function testArticleDelete()
    {
        $this->actingAs($this->user);
        Category::factory()->create();
        $category = Category::inRandomOrder()->first();

        $response = $this
            ->post('admin/articles', [
                'title' => 'Random title',
                'text' => 'Random text',
                'category_id' => $category->id
            ]);
        $article = Article::where('title', 'Random title')->first();

        $response = $this->delete('admin/articles/'.$article->id);
        $response->assertRedirect('admin/articles');            
        $article = Article::where('title', 'Random title')->first();
        $this->assertNull($article);  
    }
    public function testGuestCannotAccesAdminArticles(){
        
        $response = $this->get('admin/articles/');
        $response->assertRedirect('login');

        Category::factory()->create();
        $category = Category::inRandomOrder()->first();

        Article::factory()->create(['category_id' => $category->id]);
        $article = Article::inRandomOrder()->first();
        
        $response = $this->delete('admin/articles/'.$article->id);        
        $response->assertRedirect('login');

    }
} 
