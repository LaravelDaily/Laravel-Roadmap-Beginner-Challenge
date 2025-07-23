<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::paginate();
        $tags = Tag::all();

        return view('home', compact('posts', 'tags'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
