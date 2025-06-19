<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'tags'])
            ->latest()
            ->simplePaginate(10);

        return view('home', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article', compact('article'));
    }
}
