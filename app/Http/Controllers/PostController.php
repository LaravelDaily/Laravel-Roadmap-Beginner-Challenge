<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with('posts')->get();

        $tags = Tag::all();

        $posts = Post::with('tags', 'category')->latest()->paginate(2);

        $randomPosts = Post::inRandomOrder()->limit(3)->get();

        return view('pages.home', compact('posts','categories','tags','randomPosts'));
    }

    public function show($id)
    {
        $post = Post::with('tags')->findOrFail($id);

        $categories = Category::with('posts')->get();

        $randomPosts = Post::inRandomOrder()->limit(3)->get();

        $relatedPosts = Post::where(
            [
                ['category_id','=',$post->category->id],
                ['id','!=',$post->id]
            ])->paginate(3);

        $tags = Tag::all();

        return view('pages.post', compact('post','categories','tags','randomPosts','relatedPosts'));
    }

    public function showByTagName($tagName)
    {
        $categories = Category::with('posts')->get();

        $tags = Tag::all();

        $randomPosts = Post::inRandomOrder()->limit(3)->get();

        $posts = Post::whereHas('tags', function($query) use ($tagName) {
            $query->whereName($tagName);
          })->paginate(2);  

        return view('pages.home', compact('posts','categories','tags','randomPosts'));
    }
    public function showByCategoriesId($categoryId)
    {

       
        $categories = Category::with('posts')->get();
        

        $tags = Tag::all();

        $randomPosts = Post::inRandomOrder()->limit(3)->get();

        
        $posts = Post::where('category_id','=',$categoryId)->with('tags', 'category')->latest()->paginate(2);
        

        return view('pages.home', compact('posts','categories','tags','randomPosts'));
    }

    
}
