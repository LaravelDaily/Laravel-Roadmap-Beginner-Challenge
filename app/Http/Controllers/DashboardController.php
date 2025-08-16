<?php

namespace App\Http\Controllers;

use App\Models\Article;

class DashboardController extends Controller
{
    public function articles()
    {
        $articles = Article::with('category','tags')->paginate(12);

        return view('dashboard', compact('articles'));
    }

    public function article(Article $article)
    {
        $article->with('category','tags')->get();

        return view('article', compact('article'));
    }
}
