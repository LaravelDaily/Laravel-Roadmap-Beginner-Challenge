<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('home', compact('articles'));
    }
}
