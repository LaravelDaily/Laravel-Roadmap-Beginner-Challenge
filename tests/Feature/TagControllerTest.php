<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagControllerTest extends TestCase
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
    public function testTagStore()
    {
        $this->actingAs($this->user);
        $response = $this
            ->post('admin/tags', [
                'name' => 'Random tag',
            ]);
        $response->assertRedirect('admin/tags');

        $tag = Tag::where('name', 'Random Tag')->first();
        $this->assertNotNull($tag);

        $response = $this->get('admin/tags/'.$tag->id.'/edit');     
        $response->assertStatus(200);
    }
    public function testTagUpdate()
    {
        $this->actingAs($this->user);
        Tag::factory()->create();
        $tag = Tag::inRandomOrder()->first();
        $response = $this->put('admin/tags/' . $tag->id, [
                'name' => 'Update Random tag',
            ]); 
        $response->assertRedirect('admin/tags');
        
        $tag = Tag::where('name', 'Update Random Tag')->first();
        $this->assertNotNull($tag);              
    }
    public function testTagIndex()
    {
        $this->actingAs($this->user);
        Tag::factory()->create();
        $this->tag = Tag::inRandomOrder()->first();

        $response = $this->get('admin/tags/');
        $response->assertStatus(200);
        $response->assertViewHas('tags', function($tags) {
            return $tags->contains($this->tag);
        });

        $tags = $response->original->getData()['tags'];
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $tags);
    }    
    public function testTagDelete()
    {
        $this->actingAs($this->user);
        $response = $this->post('admin/tags', [
                'name' => 'Random tag',
            ]);
        $tag = Tag::where('name', 'Random Tag')->first();

        $response = $this->delete('admin/tags/'.$tag->id);
        $response->assertRedirect('admin/tags');            
        $tag = Tag::where('name', 'Random Tag')->first();
        $this->assertNull($tag);  
    }
    public function testGuestCannotAccesAdminTags(){
        
        $response = $this->get('admin/tags/');
        $response->assertRedirect('login');

        Tag::factory()->create();
        $tag = Tag::inRandomOrder()->first();
        $response = $this->delete('admin/tags/'.$tag->id);        
        $response->assertRedirect('login');

    }
} 
