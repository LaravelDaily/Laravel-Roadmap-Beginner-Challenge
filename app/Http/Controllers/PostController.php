<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('tags', 'category')->filter(request(['category', 'tag', 'search']))->simplePaginate(5)->withQueryString();

        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


}
