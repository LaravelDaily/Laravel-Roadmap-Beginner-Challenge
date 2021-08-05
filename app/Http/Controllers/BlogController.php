<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('home', [
            'articles' => Article::with(['category', 'tags'])
                ->latest()
                ->paginate(),
        ]);
    }

    public function show(Article $article)
    {
        return view('article', [
            'article' => $article->load(['category', 'tags'])
        ]);
    }
}
