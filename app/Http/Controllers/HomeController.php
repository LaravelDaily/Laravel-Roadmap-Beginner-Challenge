<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
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
        $articles = Article::with('category')->latest()->limit(5)->get();
        $categories = Category::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(5)->get();

        return view('home', compact('articles','categories','tags'));
    }
}
