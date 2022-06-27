<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->latest()->get();

        return view('pages.home', compact('posts'));
    }
    public function welcome()
    {
        $posts = Post::with('category', 'tags')->latest()->get();

        return view('pages.welcome', compact('posts'));
    }
}
