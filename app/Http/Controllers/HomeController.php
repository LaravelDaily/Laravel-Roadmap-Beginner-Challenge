<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userCount = User::count();
        $articleCount = Article::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();

        return view('home', compact('userCount', 'articleCount', 'categoryCount', 'tagCount'));
    }
}
